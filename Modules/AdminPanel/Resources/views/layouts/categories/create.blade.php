@extends('AdminPanel::app')

@section('sidebar')
    @include('AdminPanel::admin-sidebar')
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
                <h4 class="content-title mb-0 my-auto">Категория</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ создать</span>
            </div>
        </div>
    </div>

    <div class="card">
        <form enctype="multipart/form-data" action="{{ route('admin.categories.create') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="main-content-label mb-3">
                    Добавить категорию
                </div>
                <div class="row row-sm" id="nominal-input">

                    <div class="col-12 mb-3">
                        <label for="" class="text-muted">категория</label>
                        <input class="form-control" type="text" placeholder="Название" name="categorie[title]" required>
                        <br>
                       </div>
                    <br>
                    @csrf
                    <input type="file" name="image"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />

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
