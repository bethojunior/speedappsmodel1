@extends('layouts.page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
@endsection
@section('title', 'Painel ')
@section('content_header')
    <h1 class="m-0 text-dark">Home</h1>
@stop

@section('content_page')
    <h1 class="m-0 text-dark">Home</h1>
@stop

@section('js')
    <script src="{{ asset('js/modules/home/init.js') }}"></script>
@endsection

