
{{--@role('admin')--}}
{{--    I am a admin!--}}
{{--@else--}}
{{--    Moderator..--}}
{{--@endrole--}}

{{--@extends('AdminPanel::app')--}}
    <!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="">
    <meta name="Author" content="">
    <meta name="Keywords" content=""/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Admin-panel</title>

    @include('AdminPanel::layouts.verticallayouts.style')

</head>
<body class="main-body app sidebar-mini Light-mode">


<!-- Page -->
<div class="page">

    @include('AdminPanel::layouts.verticallayouts.main-sidebar')

    {{--    <!-- main-content -->--}}
    <div class="main-content app-content">

        @include('AdminPanel::layouts.verticallayouts.main-header')

        @include('AdminPanel::layouts.verticallayouts.mobile-header')

        <!-- container -->
        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- Container closed -->

    </div>
    <!-- main-content closed -->

    {{--			@yield('modal')--}}


</div>
<!--End Page -->

@livewireScripts
@include('AdminPanel::layouts.verticallayouts.script')

</body>

</html>






{{--@section('sidebar')--}}

{{--    @include('AdminPanel::admin-sidebar') --}}{{-- Include header --}}

{{--@endsection--}}

<ul class="side-menu circle">
    <li class="slide">
        <a class="side-menu__item" href="{{ route('home.index') }}"><span class="side-menu__label">На сайт</span></a>
    </li>
    <li class="slide">
        <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Тестовая вкладка</span><i class="angle fe fe-chevron-down"></i></a>
        <ul class="slide-menu">
            <li><a class="slide-item" href="">Первая</a></li>
            <li><a class="slide-item" href="">Вторая</a></li>
        </ul>
    </li>

    <li class="slide">
        <a class="side-menu__item" href="{{ route('admin.products') }}"><span class="side-menu__label">Товары</span></a>
    </li>

    {{--    <li class="slide">--}}
    {{--        <a  class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Ключи</span><i class="angle fe fe-chevron-down"></i></a>--}}
    {{--        <ul class="slide-menu">--}}
    {{--            <li><a class="slide-item" href="">Все ключи</a></li>--}}
    {{--            @foreach($sidebar_products as $product)--}}
    {{--                <li><a class="slide-item" href=""></a></li>--}}
    {{--            @endforeach--}}
    {{--        </ul>--}}
    {{--    </li>--}}

    {{--    <li class="slide">--}}
    {{--        <a class="side-menu__item" href=""><span class="side-menu__label">Номиналы</span></a>--}}
    {{--    </li>--}}

    <li class="slide">
        <a class="side-menu__item" href="{{ route('admin.categories') }}"><span class="side-menu__label">Категории</span></a>
    </li>

    <li class="slide">
        <a class="side-menu__item" href=""><span class="side-menu__label">Заказы</span></a>
    </li>



    {{--    <li class="slide">--}}
    {{--        <a class="side-menu__item" href="{{ route('nominals.index') }}"><i class="side-menu__icon ti-blackboard"></i><span class="side-menu__label">Номиналы</span></a>--}}
    {{--    </li>--}}

</ul>


@section('style')@endsection


{{--@section('content')--}}

{{--    <div class="container">--}}


{{--        <div class="breadcrumb-header justify-content-between">--}}
{{--            <div class="my-autof">--}}
{{--                <div class="d-flex">--}}
{{--                    <h4 class="content-title mb-0 my-auto">Панель администратора</h4>--}}
{{--                    <span class="text-muted mt-1 tx-13 ml-2 mb-0"></span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--@endsection--}}



@section('script')@endsection
