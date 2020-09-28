<?php

namespace App\Http\Controllers\Carousel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carousel\InsertImageCarousel;
use App\Http\Responses\ApiResponse;
use App\Services\Carousel\CarouselService;
use Illuminate\Http\Request;

class CarouselController extends Controller
{

    private $service;

    /**
     * CarouselController constructor.
     * @param CarouselService $carouselService
     */
    public function __construct(CarouselService $carouselService)
    {
        $this->service = $carouselService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $images = $this->service
            ->findAll();
        return view('manage.carousel')->with(['images' => $images]);
    }

    /**
     * @param InsertImageCarousel $request
     * @return \App\Models\Carousel\Carousel|string
     */
    public function insert(InsertImageCarousel $request)
    {
        try{
            $insert = $this->service
                ->insert($request->all());
        }catch (\Exception $exception){
            return redirect()->route('carousel.list')->with('error',$exception->getMessage());
        }

        return redirect()->route('carousel.list')->with('success','Imagem inserida com sucesso');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id){
        try{
            $delete = $this->service
                ->delete($id);
        }catch (\Exception $exception){
            return ApiResponse::error('',$exception->getMessage());
        }

        return ApiResponse::success($delete,'Imagem excluida com sucesso');
    }
}
