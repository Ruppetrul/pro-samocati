@extends('Home::Home.layouts.master')

@section('title', 'Login')

@section('content')
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                @include('Auth::section.image', ['image' => asset('home/images/inner-page/log-in.png')])
                <div class="col-xxl-4 col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Добро пожаловать в {{ config('app.name') }}</h3>
                        </div>
                        @if (isset($message) && $message != '')
                            <br>
                                <div style="font-: rad;" align="center">
                                    <h3><font color="red">{{ $message }}</font></h3>
                                </div>
                            <br>
                        @endif
                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="" class="text-muted">Email</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <x-auth-input name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Email or Phone" />
                                        <x-share-error name="email" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="" class="text-muted">Пароль</label>
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <x-auth-input name="password" id="password" type="password" placeholder="Password" />
                                        <x-share-error name="password" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="forgot-box">
                                        <a href="{{ route('password.request') }}" class="forgot-password">Забыли пароль?</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <x-auth-button title="Войти" />
                                </div>
                            </form>
                        </div>
{{--                        <div class="other-log-in">--}}
{{--                            <h6>or</h6>--}}
{{--                        </div>--}}
{{--                        @include('Auth::section.login-social')--}}
                        <div class="other-log-in">
                            <h6></h6>
                        </div>
                        <div class="sign-up-box">
                            <h4>Ещё не зарегистрированы?</h4>
                            <a href="{{ route('register') }}">Зарегистрироваться</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
