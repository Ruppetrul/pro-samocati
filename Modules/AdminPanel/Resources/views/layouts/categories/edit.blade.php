@extends('AdminPanel::app')

@section('sidebar')
{{--    @include('AdminPanel::admin-sidebar')--}}

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
@section('content')

    <div class="container">

{{--        @include('layouts.alert')--}}

        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">Товары</h4>
                    <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ редактирование</span>
                </div>
            </div>
        </div>

        <div class="card">
{{--            @dump($nominals, $keys)--}}
            <form enctype="multipart/form-data" action="{{ route('admin.categories.edit') }}" method="post">
{{--                @method('PUT')--}}
                @csrf
                <div class="card-body">
                    <div class="main-content-label mb-3">
                        Изменить данные
                    </div>
                    <div class="row row-sm">

                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">id</label>
                            <br>
                            <input class="form-control" type="text" readonly="readonly" value="{{$category['id']}}" name="category[id]">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="" class="text-muted">Название</label>
                            <input class="form-control" value="{{$category['title']}}" type="text" name="category[title]" required>
                        </div>

                    </div>
                    <div class="col-12 mb-3">
                        <label for="" class="text-muted">Старая картинка</label>
                        <img width="300" height="300" src="
                        @if (isset($category['first_media']['filename']))
                            {{ asset($category['first_media']['filename']) }}
                        @else {{ asset('home/images/default_item_img.jpg')}}
                        @endif
                         " class="img-fluid blur-up lazyload" alt="product image">
                        <br>
                        <label for="" class="text-muted">Новая картинка</label>

                        @csrf
                        <input type="file" name="image"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />

                    </div>
                    <button type="submit" class="btn btn-success btn-block col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">Сохранить</button>
                </div>


            </form>
        </div>

    </div>


@endsection
