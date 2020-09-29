<?php

namespace App\Http\Controllers;

use App\Services\Blog\BlogService;
use App\Services\Carousel\CarouselService;
use App\Services\Specialty\SpecialtyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * @param CarouselService $carouselService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CarouselService $carouselService, SpecialtyService $specialtyService, BlogService $blogService)
    {
        $blogs = $blogService->findAll();
        $images = $carouselService->findAll();
        $specialty = $specialtyService->findAll();
        return view('pages.home')
            ->with(
                [
                    'images' => $images,
                    'specialties' => $specialty,
                    'blogs' => $blogs,
                ]
            );
    }
}
