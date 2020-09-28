@extends('layouts.page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
@endsection
@section('title', 'Painel administrativo ')
@section('content_header')
    <h1 class="m-0 text-dark">Inserir Blog</h1>
@stop

@section('content')
    @include('includes.alerts')
    <form class="row col-lg-12" action="{{ route('blog.insert') }}"
           method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="col-lg-6">
            <div class="form-group col-lg-12">
                <span>Titulo</span>
                <input name="title" class="form-control">
            </div>
            <div class="form-group col-lg-12">
                <span>Conteudo do blog</span>
                <textarea name="content" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-lg-6 position-relative choose-image-blog">
            <span class="position-absolute p-3">As imagens devem seguir um padrão de 750 x 300</span>
            <input class="position-absolute inputFile" id="choose-image-blog" type="file" name="image">
            <img id="preview-image-blog" class="img-thumbnail" src="{{ asset('assets/images/icons/750x300.png') }}">
        </div>
        <input type="submit" class="btn btn-success" value="Enviar">
    </form>
@stop

@section('js')
    <script src="{{ asset('js/modules/blog/insert.js') }}"></script>
@endsection

