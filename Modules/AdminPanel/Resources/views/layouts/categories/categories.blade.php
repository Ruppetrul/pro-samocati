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
    <!-- Internal  Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('assets/css/checkbox.css')}}" rel="stylesheet">

    <script src="{{URL::asset('assets/plugins/jquery/jquery.min.js')}}"></script>
@endsection

@section('content')

    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <h3 class="content-title mb-2">Категории</h3>
        </div>
        <div class="d-flex align-items-end flex-wrap my-auto right-content breadcrumb-right">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success mt-2 mt-xl-0">Добавить категорию</a>
        </div>
    </div>

{{--    @include('layouts.alert')--}}

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-md-nowrap" id="example1">
                    <thead>
                    <tr>
                        <th>id категории</th>
                        <th>Название</th>
                        <th>Картинка</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $categories as $categorie)
                        <tr>
                            <td>
                                {{ $categorie['id'] }}
                            </td>
                            <td>
                                {{ $categorie['title'] }}
                            </td>
                            <td>
                                <img width="200" height="200" src="
                                @if (isset($categorie->first_media->thumb))
                                    {{ URL::to('/') . '/'  . $categorie->first_media->thumb }}
                                @else
                                    {{ asset('home/images/default_item_img.jpg') }}
                                @endif
                                 " class="blur-up lazyload"
                                     alt="google">
                            </td>

{{--                            <td>--}}
{{--                                <a href="{{ route('products.addNominals', $product['id']) }}">добавить</a>--}}
{{--                            </td>--}}
                            <td> <a href="{{ route('admin.categories.edit', ['id' => $categorie['id']]) }}">Редактировать</a></td>
                            <td> <a href="{{ route('admin.categories.delete', ['id' => $categorie['id']]) }}">Удалить</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    {{--    <!-- Internal Datatable js -->--}}
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/checkbox-switch/checkbox-switch.js')}}"></script>
@endsection


