<?php

namespace Modules\Auth\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Home\Http\Controllers\Cart\CartController;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class LoginController extends Controller
{
    /**
     * Show login page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view(Request $request)
    {
        list ($cart_detail, $cart_total) = \Modules\Cart\Http\Controllers\CartController::getCartData();

        $message = $request->has('message') ? $request->get('message') : '';

        return view('Auth::login', compact('cart_detail', 'cart_total', 'message'));
    }

    /**
     * Login user by request.
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $field = $this->filterEmail($email);

        if (Auth::attempt([$field => $email, 'password' => $request->password])) {
            // Если по ip есть корзина, а у юзера нет, то переносим её.

            $cart_ip = DB::table('cart')->where('ip_address', '=', $_SERVER['REMOTE_ADDR'])->first();

            $cart_user = DB::table('cart')->where('user_id', '=', Auth::user()->id)->first();

            if ($cart_ip && !$cart_user) {

                $update_cart_id = $cart_ip->id;
                DB::table('cart')->where('id', '=', $update_cart_id)->update(
                    array(
                        'user_id' => Auth::user()->id
                    )
                );
            }

            $cart_user = DB::table('cart')->where('user_id', '=', Auth::user()->id)->first();

            if ($cart_user) {
                DB::table('cart')->where('id', '=', $cart_user->id)->update(
                    array(
                        'ip_address' => $_SERVER['REMOTE_ADDR'])
                );
            }


            ShareService::successToast('Login successfully');

            return to_route('home.index');
        }



        ShareService::errorToast('Login unsuccessfully');

        return to_route('login',  array('message' => 'Проверьте логин или пароль.'));
    }

    /**
     * Filter string to give email or phone for login.
     *
     * @param string $field
     *
     * @return string
     */
    private function filterEmail(string $field): string
    {
        return filter_var($field, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
    }
}
