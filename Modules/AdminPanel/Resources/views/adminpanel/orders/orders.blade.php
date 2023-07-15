@extends('adminpanel::adminpanel.app')

@section('sidebar')
    @include('adminpanel::adminpanel.adminsidebar')
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
                        <th>id</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $orders as $order)
                        <tr>
                            <td>
                                {{ $order->id }}
                            </td>
                            <td>
                                {{ $order->status }}
                            </td>
                            <td>
{{--                                <img style="width: 100%; max-width: 250px;" src="--}}
{{--                                @if (isset($categorie->first_media->thumb))--}}
{{--                                    {{ URL::to('/') . '/'  . $categorie->first_media->thumb }}--}}
{{--                                @else--}}
{{--                                    {{ asset('home/images/default_item_img.jpg') }}--}}
{{--                                @endif--}}
{{--                                 " class="blur-up lazyload"--}}
{{--                                     alt="google">--}}
                            </td>

                            {{--                            <td>--}}
                            {{--                                <a href="{{ route('products.addNominals', $product['id']) }}">добавить</a>--}}
                            {{--                            </td>--}}
{{--                            <td>--}}
{{--                                <a href="{{ route('admin.categories.edit', ['id' => $categorie['id']]) }}">Редактировать</a>--}}
{{--                            </td>--}}
{{--                            <td><a href="{{ route('admin.categories.delete', ['id' => $categorie['id']]) }}">Удалить</a>--}}
{{--                            </td>--}}

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


