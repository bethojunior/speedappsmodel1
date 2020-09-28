@extends('adminlte::master')
@extends('pages.nav')

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="theme-color" content="#F56A6A"/>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />


<meta name="description" content="" />
<meta property="og:title" content="" />
<meta property="og:type" content="article" />
<meta property="og:url" content="" />
<meta property="og:image" content="" />
<meta property="og:description" content="" />
<meta property="og:site_name" content="" />



<link rel="stylesheet" href="{{ asset('css/default/config.css') }}">
<link rel="stylesheet" href="{{ asset('config/main.css') }}">
<script src="{{ asset('js/libs/jquery.js') }}"></script>
<script src="{{ asset('js/utils/ElementProperty.js') }}"></script>
<script src="{{ asset('config/main.js') }}"></script>
@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
