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
    <div class="col-lg-4">
        <form class="form-group">
            <span>Pesquisar</span>
            <input id="search-blog" class="form-control">
        </form>
    </div>
    <div class="row col-lg-12">
        @foreach($blogs as $blog)
            <div value="{{ $blog->title }}" class="card col-lg-3 ml-2 mr-2 blog{{$blog->id}} through-blogs">
                <img class="card-img-top pt-2" src="{{ url('storage').'/'.$blog->image }}">
                <div class="card-body">
                    <h5 class="card-title"> {{ $blog->title }} </h5>
                    <p class="card-text"> {{ $blog->content }} </p>
                    <label id=" {{ $blog->id }} " class="btn btn-danger delete-blog">Deletar</label>
                </div>
            </div>
        @endforeach
    </div
@stop

@section('js')
    <script src="{{ asset('js/modules/blog/list.js') }}"></script>
    <script src="{{ asset('js/controllers/Blog/BlogController.js') }}"></script>
@endsection


