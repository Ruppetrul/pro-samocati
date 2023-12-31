<?php

namespace Modules\AdminPanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Modules\Category\Models\Category;
use Modules\Category\Repositories\CategoryRepoEloquent;
use Modules\Media\Models\Media;
use Modules\Media\Repositories\MediaRepoEloquent;
use Modules\Product\Models\Product;
use Modules\Product\Repositories\ProductRepoEloquent;
use Modules\Product\Services\ProductService;
use Modules\User\Models\User;

class AdminPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('adminpanel::index');
    }

    public function products() {
        $products = Product::all();
        return view('adminpanel::adminpanel.products.products', array('products' => $products));
    }

    public function products_create(Request $request) {
        $media_id = null;
        if ($request->isMethod('post')) {
            $product = $request->post('product');
            if ($request->hasFile('image')) {
                $validatedData = $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10048',

                ]);


                $file = $request->file('image');
                $path = $file->hashName();
                $image = Image::make($file)->resize(600, 600);
                Storage::disk('public')->put($path, $image->stream());

                $path = 'storage/' . $path;
                $media = Media::query()->create([
                    'user_id'     => 1,
                    'filename'    => $path,
                    'files'       => $path,
                    'type'        => 'image',
                    'is_private'  => 0,
                ]);

                $media_id = $media['id'];
            }

            $product = resolve(ProductRepoEloquent::class)->create($product,  $media_id);

            $categories = $request->post('categories');

            $cat_list = array();
            if ($categories) {
                $cat_list = array_keys($categories);
            }


            (new ProductService())->attachCategoriesToProduct($cat_list, $product);


/*    /**
     * Attach categories to product.
     *
     * @param $categories
     * @param $product
     *
     * @return void
     */
//            public function attachCategoriesToProduct($categories, $product)
//            {
//                foreach ($categories as $category) {
//                    $product->categories()->attach($category);
//                }
//            }*/

            Log::info(json_encode($product));

            return redirect()->route('admin.products');
        } else {
            return view('adminpanel::adminpanel.products.create',
                array(
                    'products' => array(),
                    'categories' => Category::all(),
                )
            );
        }
    }

    public function products_edit(Request $request) {

        if ($request->isMethod('post') || $request->isMethod('PUT')) {

            $product = $request->get('product');

            //$media_id = null;
            if ($request->hasFile('image')) {
                $validatedData = $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10048',

                ]);
                $file = $request->file('image');
                $path = $file->hashName();
                $image = Image::make($file)->resize(600, 600);
                Storage::disk('public')->put($path, $image->stream());

                $path = 'storage/' . $path;

                $media = Media::query()->create([
                    'user_id'     => 1,
                    'filename'    => $path,
                    'files'       => $path,
                    'type'        => 'image',
                    'is_private'  => 0,
                ]);

                $product['first_media_id'] = $media['id'];
            }

            $product_id = $product['id'];
            resolve(ProductRepoEloquent::class)->update($product_id, $product);

            $product = resolve(ProductRepoEloquent::class)->findById($product_id);

            if ($categories = $request->post('categories')) {

             DB::table('product_category')->where('product_id', $product_id)->delete();

                    /*::query()
            ->with('media')
            ->active()
            ->where('location', $location);*/
             //   (new ProductService())->attachCategoriesToProduct(array(), $product)
                (new ProductService())->attachCategoriesToProduct(array_keys($categories), $product);
            }

            return redirect()->route('admin.products');
        } else {
            $product_id = $request->get('id');

            $product = resolve(ProductRepoEloquent::class)->findById($product_id);

            $rel_categorioes = array();
            if ($product['categories']) {
                foreach ($product['categories'] as $category) {
                    $rel_categorioes[] = $category['id'];
                }
            }
            //var_dump($product);

            return view('adminpanel::adminpanel.products.edit', array(
                'product' => $product,
                'categories' => Category::all(),
                'rel_categories' => $rel_categorioes,
            ));
        }
    }

    public function products_delete(Request $request) {

        $priduct_id = $request->get('id');

        $res = resolve(ProductRepoEloquent::class)->delete($priduct_id);

        return redirect()->route('admin.products');
    }

    public function categories(Request $request) {
        $categories = Category::all();
        return view('adminpanel::adminpanel.categories.categories', ['categories' => $categories]);
    }

    public function orders(Request $request) {
        $orders = DB::table('cart')->where('status', '!=', 0)->select()->orderByDesc('id')->get();

        foreach ($orders as &$order) {
            $cart_detail = DB::table('cart_details')
                ->where('cart_id', '=', $order->id, 'AND')
                ->select()->get();

            foreach ($cart_detail as &$detail) {
                $prd = Product::query()->where('id', '=', $detail->product_id)->first();

                if ($prd) {
                    $detail->product_name = $prd->title;
                }

                $detail->products_count_id_cart = $detail->count;
            }

            $order->detail = $cart_detail;

            $user = User::query()->where('id', '=', $order->user_id)->first();
            $order->user_name = $user->name;
            $order->user_phone = $user->phone;
            $order->user_email = $user->email;
        }

        return view('adminpanel::adminpanel.orders.orders', ['orders' => $orders]);
    }


    public function categories_create(Request $request) {
        if (($request->isMethod('post') or $request->isMethod('put')) and $request->post('categorie')) {

            $category = $request->post('categorie');

            //$media_id = null;
            if ($request->hasFile('image')) {
                $validatedData = $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10048',

                ]);
                $file = $request->file('image');
                $path = $file->hashName();
                $image = Image::make($file)->resize(600, 600);
                Storage::disk('public')->put($path, $image->stream());

                $path = 'storage/' . $path;

                $media = Media::query()->create([
                    'user_id'     => 1,
                    'filename'    => $path,
                    'files'       => $path,
                    'type'        => 'image',
                    'is_private'  => 0,
                ]);

                $category['media_id'] = $media['id'];
            }

            resolve(CategoryRepoEloquent::class)->create($category);
            $categories = Category::all();
            return view('adminpanel::adminpanel.categories.categories', ['categories' => $categories]);
        } else {
            return view('adminpanel::adminpanel.categories.create');
        }
    }

    public function categories_edit(Request $request) {
        log::debug('categories_edit');
        if (($request->isMethod('post') or $request->isMethod('put')) and $request->post('category')) {
            log::debug('categories_edit 1.5');
            $category= $request->get('category');

            if ($request->hasFile('image')) {
                $validatedData = $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10048',

                ]);
                $file = $request->file('image');
                $path = $file->hashName();
                $image = Image::make($file)->resize(600, 600);
                Storage::disk('public')->put($path, $image->stream());

                $path = 'storage/' . $path;

                $media = Media::query()->create([
                    'user_id'     => 1,
                    'filename'    => $path,
                    'files'       => $path,
                    'type'        => 'image',
                    'is_private'  => 0,
                ]);

                $category['media_id'] = $media['id'];
            }

            $category = resolve(CategoryRepoEloquent::class)->update($category['id'], $category);
            log::debug($category);
            log::debug('categories_edit 2');
            return redirect()->route('admin.categories');
        }
        log::debug('categories_edit 1.6');
        $category_id = $request->get('id');

        $category = resolve(CategoryRepoEloquent::class)->findById($category_id);
        log::debug('categories_edit 3');
        return view('adminpanel::adminpanel.categories.edit', array('category' => $category));
    }

    public function categories_delete(Request $request) {

        $category_id = $request->get('id');

        $res = resolve(CategoryRepoEloquent::class)->delete($category_id);

        return redirect()->route('admin.categories');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('adminpanel::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('adminpanel::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('adminpanel::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

}
