<?php


namespace App\Repositories\Carousel;


use App\Contracts\Repository\AbstractRepository;
use App\Models\Carousel\Carousel;

class CarouselRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->setModel(Carousel::class);
    }
}
