@extends('layouts.page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
@endsection
@section('title', 'Painel administrativo ')
@section('content_header')
    <h1 class="m-0 text-dark">Listagem Blogs</h1>
@stop

@section('content')
    @include('includes.alerts')
    <div class="row col-lg-12">
        @foreach($blogs as $blog)
            <div class="card col-lg-3 ml-2 mr-2">
                <img class="card-img-top pt-2" src="{{ url('storage').'/'.$blog->image }}">
                <div class="card-body">
                    <h5 class="card-title"> {{ $blog->title }} </h5>
                    <p class="card-text"> {{ $blog->content }} </p>
                    <a href="#" class="btn btn-primary">Deletar</a>
                </div>
            </div>
        @endforeach
    </div
@stop

@section('js')
    <script src="{{ asset('js/modules/blog/insert.js') }}"></script>
@endsection

