<?php

namespace Modules\Home\Http\Controllers\Home;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Category\Models\Category;
use Modules\Home\Http\Controllers\Cart\CartController;
use Modules\Home\Repositories\Home\HomeRepoEloquentInterface;
use Modules\Product\Models\Product;
use Modules\Share\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show home page.
     *
     * @param HomeRepoEloquentInterface $homeRepo
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(HomeRepoEloquentInterface $homeRepo)
    {

        list ($cart_detail, $cart_total) = \Modules\Cart\Http\Controllers\CartController::getCartData();

        //array('category' => $category)
        //compact('homeRepo'),
        Log::debug(compact('homeRepo'));

        $categories = Category::all(); //TODO популярные
        return view('Home::Pages.home.index', array(
            'homeRepo' => $homeRepo,
            'categories' => $categories,
            'cart_detail' => $cart_detail,
            'cart_total' => $cart_total,
//            'cart_detail' => array(),
        ));

    }
}
