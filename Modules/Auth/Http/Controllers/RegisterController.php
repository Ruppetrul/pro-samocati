<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Services\RegisterService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class RegisterController extends Controller
{
    /**
     * Show register page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view()
    {
        list ($cart_detail, $cart_total) = \Modules\Cart\Http\Controllers\CartController::getCartData();
        return view('Auth::register', compact('cart_detail', 'cart_total'));
    }

    /**
     * Register user by request.
     *
     * @param RegisterRequest $request
     * @param RegisterService $registerService
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request, RegisterService $registerService)
    {
Log::info('start');
        $user = $registerService->storeUser($request->all()); // Make user
Log::info($user);

        auth()->login($user); // Login User
        event(new Registered($user)); // Fire event

        ShareService::successToast('You register successfully');

        return to_route('home.index');
    }
}
