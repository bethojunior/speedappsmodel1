<?php


namespace App\Services\Carousel;


use App\Models\Carousel\Carousel;
use App\Repositories\Carousel\CarouselRepository;
use Illuminate\Support\Facades\DB;

class CarouselService
{

    private $repository;

    /**
     * CarouselService constructor.
     * @param CarouselRepository $carouselRepository
     */
    public function __construct(CarouselRepository $carouselRepository)
    {
        $this->repository = $carouselRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function findAll()
    {
        return $this->repository->all();
    }

    /**
     * @param array $request
     * @return Carousel
     */
    public function insert(array $request)
    {
        $filename =
            \Storage::disk('public')->putFile('carousel',$request['path_image']);

        $path_image = $filename;

        $carousel = [
            'path_image' => $path_image
        ];
        $insert = new Carousel($carousel);
        $this->repository->save($insert);

        return $insert;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     * @throws \Exception
     */
    public function delete($id)
    {
        try{
            DB::beginTransaction();
            $result = $this->repository->find($id);
            $result->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }

        return $result;
    }

}
