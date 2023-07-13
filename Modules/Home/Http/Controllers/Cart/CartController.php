<?php

namespace Modules\Home\Http\Controllers\Cart;

use Illuminate\Http\Request;
use Modules\Share\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __invoke(Request $request)
    {

        $message = $request->has('message') ? $request->get('message') : null;
//        var_dump($message);
//        die();
        list($cart_detail, $cart_total) = \Modules\Cart\Http\Controllers\CartController::getCartData();
        return view('Home::Pages.carts.index', [
            'cart_detail' => $cart_detail,
            'cart_total' => $cart_total,
            'message' => $message
        ]);
    }
}
