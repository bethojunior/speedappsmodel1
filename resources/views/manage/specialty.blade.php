@extends('layouts.page')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home/init.css') }}">
@endsection
@section('title', 'Painel administrativo ')
@section('content_header')
    <h1 class="m-0 text-dark">Especialidades</h1>
@stop

@section('content')
    @include('includes.alerts')
    <div class="row col-lg-12">
        <form class="row col-lg-12" action="{{ route('specialty.store') }}"
              method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
            <div class="col-lg-6">
                <div class="form-group col-lg-12">
                    <span>Titulo</span>
                    <input name="title" class="form-control">
                </div>
                <div class="form-group col-lg-12">
                    <span>Conteudo </span>
                    <textarea name="content" class="form-control"></textarea>
                    <input type="submit" class="btn btn-success form-control col-lg-3 mt-2" value="Enviar">
                </div>

            </div>
            <div class="col-lg-6 position-relative choose-image-blog mt-4">
                <input class="position-absolute inputFile" id="choose-image-blog" type="file" name="image">
                <img id="preview-image-blog" class="img-thumbnail" src="https://www.4devs.com.br/4devs_gerador_imagem.php?acao=gerar_imagem&txt_largura=138&txt_altura=138&extensao=png&fundo_r=0.06274509803921569&fundo_g=0.996078431372549&fundo_b=0.9568627450980393&texto_r=0&texto_g=0&texto_b=0&texto=138%20x%20138&tamanho_fonte=10">
            </div>
        </form>
    </div>
    <hr class="featurette-divider">
    <h4>Listagem </h4>
    <div class="row col-lg-12">
        @foreach($specialties as $specialty)
            <div value="{{ $specialty->title }}" class="card col-lg-3 ml-2 mr-2 specialty{{$specialty->id}} through-blogs">
                <img width="13vw" class="card-img-top pt-2" src="{{ url('storage').'/'.$specialty->image }}">
                <div class="card-body">
                    <h5 class="card-title"> {{ $specialty->title }} </h5>
                    <p class="card-text"> {{ $specialty->content }} </p>
                    <label id=" {{ $specialty->id }} " class="btn btn-danger delete-specialty">Deletar</label>
                </div>
            </div>
        @endforeach
    </div

@stop

@section('js')
    <script src="{{ asset('js/modules/specialty/insert.js') }}"></script>
    <script src="{{ asset('js/controllers/Specialty/SpecialtyController.js') }}"></script>
@endsection


