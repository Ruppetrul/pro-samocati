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
        <a class="side-menu__item" href="{{ route('admin.orders') }}"><span class="side-menu__label">Заказы</span></a>
    </li>



    {{--    <li class="slide">--}}
    {{--        <a class="side-menu__item" href="{{ route('nominals.index') }}"><i class="side-menu__icon ti-blackboard"></i><span class="side-menu__label">Номиналы</span></a>--}}
    {{--    </li>--}}

</ul>
