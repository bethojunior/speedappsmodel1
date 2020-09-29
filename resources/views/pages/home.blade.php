@extends('layouts.init')


<title>Home</title>

<link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">

<main class="main" role="main">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
{{--        <ol class="carousel-indicators">--}}
{{--            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
{{--            <li data-target="#myCarousel" data-slide-to="1"></li>--}}
{{--            <li data-target="#myCarousel" data-slide-to="2"></li>--}}
{{--        </ol>--}}
        <div class="carousel-inner">
            @foreach($images as $image)
                <div class="carousel-item">
                    <img style="width: 100%" src="{{ url('storage').'/'.$image->path_image }}">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <div class="container marketing">

        <div class="center mb-4">
            <h4>Especialidades</h4>
        </div>

        <div class="row specialties">
            @foreach($specialties as $specialty)
                <div class="card col-lg-4">
                    <div class="center">
                        <p class="card-title center">{{ $specialty->title }}</p>
                    </div>
                    <div class="center">
                        <img style="width: 14vw;" class="card-img-top p-3" alt="..." src="{{ url('storage').'/'.$specialty->image }}">
                    </div>
                    <div class="card-body">

                        <p class="card-text">{{ $specialty->content }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
            </div>
        </div>

        <hr class="featurette-divider">
    </div>
    <footer class="container">
        <p class="float-right"><a href="#">Voltar para o incio</a></p>
        <p>&copy; 2020 SpeedApps &middot; </p>
    </footer>
</main>

@section('js')
    <script src="{{ asset('js/modules/home/init.js') }}"></script>
@endsection
