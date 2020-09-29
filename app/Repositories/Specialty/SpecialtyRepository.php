<?php


namespace App\Repositories\Specialty;


use App\Contracts\Repository\AbstractRepository;
use App\Models\Specialties\Specialties;

class SpecialtyRepository extends AbstractRepository
{

    public function __construct()
    {
        $this->setModel(Specialties::class);
    }

}
