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

@section('style')

    <!--- Select2 css-->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Internal Sumoselect css-->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/sumoselect/sumoselect.css')}}">

@endsection

@section('content')

{{--    @include('layouts.alert')--}}

    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Товар</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ создать</span>
            </div>
        </div>
    </div>

    <div class="card">
        <form enctype="multipart/form-data" action="{{ route('admin.products.create') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="main-content-label mb-3">
                    Добавить товар
                </div>
                <div class="row row-sm" id="nominal-input">

                    <div class="col-12 mb-3">
                        <label for="" class="text-muted">Товар</label>
                        <input class="form-control" type="text" placeholder="Название" name="product[name]" required>
                        <br>
                        <input class="form-control" type="number" placeholder="Артикул" name="product[sku]" required>
                        <br>
                        <input class="form-control" type="text" placeholder="Цена за шт" name="product[price]" required>
                        <br>
                        <input class="form-control" type="number" placeholder="Количество в наличии" name="product[count]" required>
                        <br>
                        <
                        @csrf
                        <input type="file" name="image"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
{{--                        <input class="form-control mt-1" placeholder="plati-market id" type="number" name="product[id]" required>--}}
{{--                        <input class="form-control mt-1" placeholder="Дата старта продаж" type="text" name="product[start_date]" required value="{{date('d.m.Y H:i:s')}}">--}}
{{--                        <input class="form-control mt-1" placeholder="Ограничение по количеству выдаваемых ключей" type="number"  name="product[limit_keys]" required>--}}
{{--                        <input class="form-control mt-1" placeholder="Минимально допустимое количество ключей у товара (при дочтижении этого количества, отправляется оповещение в телеграм)" type="number"  name="product[min_product_quantity]" required>--}}
                        <br>
                        <br>
                        <ul>
                            @foreach($categories as $category)
                                 <li value=" {{ $category['id'] }}"><input type="checkbox" name="{{ 'categories[' . $category['id'] . ']'}}"> {{ $category['title'] }}</li>
                            @endforeach
                        </ul>

                    </div>
                </div>
{{--                <a href="#" class="btn btn-primary mb-3" id="addNominal">Добавить номинал</a>--}}

                <button type="submit" class="btn btn-success btn-block  col-sm-6 col-md-3 mg-t-10 mg-sm-t-0">Сохранить</button>
            </div>
        </form>
    </div>


@endsection

@section('script')

    <!-- dinamic form js -->
    <script src="{{URL::asset('assets/js/product-form/product-form.js')}}"></script>

    <!-- Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

    <!-- Select2 js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>

    <!-- Internal Jquery.steps js -->
    <script src="{{URL::asset('assets/plugins/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

    <!-- Internal Form-elements js-->
    <script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>

    <!-- Internal Sumoselect js-->
    <script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>

    <!-- Internal Form-wizard js -->
    <script src="{{URL::asset('assets/js/form-wizard.js')}}"></script>



@endsection
