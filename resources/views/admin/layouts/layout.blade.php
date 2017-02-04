<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>

    <title>@yield('title')</title>
    @section('css')
        <link rel="icon" type="image/png" href="{{ asset('admin/i/favicon.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('admin/i/app-icon72x72@2x.png') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/amazeui.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('admin/css/amazeui.datatables.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
    @show
    @section('js')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
    @show
</head>
<body>
<script src="{{ asset('admin/js/theme.js') }}"></script>
<div class="am-g tpl-g">
    @include('admin.layouts._header')
    @include('admin.layouts._left-sidebar')
    @include('admin.layouts._skiner')

    @section('content')
    @show
</div>

@section('script')
    <script src="{{ asset('admin/js/amazeui.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
@show
</body>
</html>
