@extends('layouts.init')

<link rel="stylesheet" href="{{ asset('css/pages/blog.css') }}">
<title>Blog</title>

<div class="container main margin-nav">
    <div class="row">
        <div class="col-md-8">

            <h1 class="my-4">
                <small>Blog</small>
            </h1>

            @foreach($blogs as $blog)
                <div value="{{ $blog->title }}" class="card mb-4 through-blogs">
                    <img class="card-img-top"  alt="Card image cap" src="{{ url('storage').'/'.$blog->image }}">
                    <div class="card-body">
                        <h2 class="card-title">{{ $blog->title }}</h2>
                        <p class="card-text"> {{ $blog->content }} </p>
                        <a href="#" class="btn btn-primary">Ler mais →</a>
                    </div>
                    <div class="card-footer text-muted">
                        {{ \Carbon\Carbon::parse($blog->created_at)->format('d/m/Y')}}
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4 card-options">
            <div class="card">
                <h5 class="card-header card-header-mine">Buscar</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" id="search-blogs" class="form-control" placeholder="Digite aqui">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="button">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                </svg>
                            </button>
                      </span>
                    </div>
                </div>
            </div>

{{--            <div class="card my-4">--}}
{{--                <h5 class="card-header">Categories</h5>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <ul class="list-unstyled mb-0">--}}
{{--                                <li>--}}
{{--                                    <a href="#">Web Design</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">HTML</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Freebies</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <ul class="list-unstyled mb-0">--}}
{{--                                <li>--}}
{{--                                    <a href="#">JavaScript</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">CSS</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">Tutorials</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="card my-4">
                <h5 class="card-header card-header-mine">Ultimos artigos</h5>
                <div class="card-body">
                    @foreach($blogs as $blog)
                        <div class="card p-1 pointer">
                            {{ $blog->title }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

@section('js')
    <script src="{{ asset('js/modules/pages/blog/list.js') }}"></script>
@endsection
