
{{--@role('admin')--}}
{{--    I am a admin!--}}
{{--@else--}}
{{--    Moderator..--}}
{{--@endrole--}}

@extends('AdminPanel::layouts.admincomponents.app')

@section('sidebar')
    @include('AdminPanel::layouts.admincomponents.adminsidebar') {{-- Include header --}}
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
