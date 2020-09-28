<?php

namespace App\Http\Controllers;

use App\Services\Carousel\CarouselService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * @param CarouselService $carouselService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CarouselService $carouselService)
    {
        $images = $carouselService->findAll();
        return view('pages.home')->with(['images' => $images]);
    }
}
