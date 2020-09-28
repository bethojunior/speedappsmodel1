@extends('layouts.page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
@endsection
@section('title', 'Painel administrativo ')
@section('content_header')
    <h1 class="m-0 text-dark">Carrossel de imagens</h1>
@stop

@section('content')
    @include('includes.alerts')
    <div class="row col-lg-8">
        <form class="form-group col-lg-6"
              action="{{ route('carousel.insert') }}"
              method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <span>As imagens devem ter o padrão de tamanho 1200 x 400</span>
            <div class="input-group mb-3">
                <div class="custom-file">
                    <input name="path_image" type="file" class="custom-file-input" id="choose-image" aria-describedby="choose-image">
                    <label class="custom-file-label" for="choose-image">Escolha o arquivo</label>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Enviar">
        </form>
    </div>
    <div class="col-lg-12">
        <img id="preview-image" class="img-thumbnail" src="{{ asset('assets/images/icons/default.png') }}">
    </div>
    <div class="row col-lg-12 mt-2">
        @foreach($images as $image)
            <div class="card col-lg-2 ml-2 pb-1 image{{$image->id}}">
                <img src="{{ url('storage').'/'.$image->path_image }}" class="card-img-top pt-2" alt="...">
                <button id="{{ $image->id }}" class="btn btn-danger delete-carousel">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
        @endforeach
    </div>

@stop

@section('js')
    <script src="{{ asset('js/modules/settings/carousel.js') }}"></script>
    <script src="{{ asset('js/controllers/Carousel/CarouselController.js') }}"></script>
@endsection

