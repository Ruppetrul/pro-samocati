
{{--@role('admin')--}}
{{--    I am a admin!--}}
{{--@else--}}
{{--    Moderator..--}}
{{--@endrole--}}

@yield('AdminPanel::app')

@section('sidebar')
{{--    @include('AdminPanel::admin-sidebar') --}}{{-- Include header --}}

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

@endsection

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
