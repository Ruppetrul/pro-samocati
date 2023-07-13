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




