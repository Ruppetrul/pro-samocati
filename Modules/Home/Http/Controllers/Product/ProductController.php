<?php

namespace Modules\Home\Http\Controllers\Product;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Advertising\Enums\AdvertisingLocationEnum;
use Modules\Cart\Http\Controllers\CartController;
use Modules\Category\Models\Category;
use Modules\Home\Repositories\Advertising\AdvertisingRepoEloquentInterface;
use Modules\Home\Repositories\Product\ProductRepoEloquentInterface;
use Modules\Product\Models\Product;
use Modules\Share\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Get latest products.
     *
     * @param ProductRepoEloquentInterface $productRepoEloquent
     *
     * @return Application|Factory|View
     */
    public function index(ProductRepoEloquentInterface $productRepoEloquent, Request $request)
    {

        $selected_categories = array();
        if ($request->has('categories')) {
            $selected_categories = $request->get('categories');
            $selected_categories = array_keys($selected_categories);

            $products_ids = array();

            $product_categories = DB::table('product_category')
                ->whereIn('category_id', $selected_categories)
                ->get();

            foreach ($product_categories as $product_cat) {
                $products_ids[] = $product_cat->product_id;
            }

            $pre = $productRepoEloquent
                ->getLatest()
                ->with(['first_media'])
                ->withCount('rates')
                ->whereIn('id', array_values($products_ids));

            if ($request->has('search')) {
                $pre->orWhere('title', 'like', '%' . $request->get('search') . '%');
            }
            $products = $pre
                ->paginate(10);
        } else {
            $pre = $productRepoEloquent
                ->getLatest()
                ->with(['first_media'])
                ->withCount('rates');

            if ($request->has('search')) {
                $pre->where('title', 'like', '%' . $request->get('search') . '%');
            }

            $products = $pre->paginate(10);
        }

        $advs = resolve(AdvertisingRepoEloquentInterface::class)
            ->getAdvertisingsByLocation(AdvertisingLocationEnum::LOCATION_PRODUCT_PAGE->value)
            ->with('media')
            ->limit(8)
            ->latest()
            ->get();

        $categories = Category::all();

        list ($cart_detail, $cart_total) = CartController::getCartData();

        $search = $request->has('search') ? $request->get('search') : '';

        return view('Home::Pages.products.index', compact(['products', 'advs', 'categories', 'selected_categories', 'cart_detail', 'cart_total', 'search']));
    }

    /**
     * Detail product with sku & slug.
     */
    public function details($sku,
//                            $slug,
                            ProductRepoEloquentInterface $productRepoEloquent)
    {
        $product = $productRepoEloquent->findProductBySkuWithSlug($sku, 'slug');
        $similarProducts = $productRepoEloquent->getSimilarProductsByCategories($product->categories);
        $advertising = resolve(AdvertisingRepoEloquentInterface::class)
            ->getAdvertisingsByLocation(AdvertisingLocationEnum::LOCATION_PRODUCT_DETAIL->value)
            ->with('media')
            ->first();


        list ($cart_detail, $cart_total) = CartController::getCartData();

        return view('Home::Pages.products.details', compact(['product', 'similarProducts', 'advertising', 'cart_detail'
            , 'cart_total']));
    }
}
