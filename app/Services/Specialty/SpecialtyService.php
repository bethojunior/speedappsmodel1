<?php


namespace App\Services\Specialty;


use App\Models\Specialties\Specialties;
use App\Repositories\Specialty\SpecialtyRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SpecialtyService
{
    private $repository;

    /**
     * SpecialtyService constructor.
     * @param SpecialtyRepository $specialtyRepository
     */
    public function __construct(SpecialtyRepository $specialtyRepository)
    {
        $this->repository = $specialtyRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function findAll()
    {
        return $this->repository->all()->sortDesc();
    }

    /**
     * @param array $request
     * @return Specialties
     */
    public function insert(array $request)
    {
        $user = Auth::user();
        $filename =
            \Storage::disk('public')->putFile('specialty',$request['image']);

        $path_image = $filename;

        $data = [
            'image' => $path_image,
            'title' => $request['title'],
            'content' => $request['content'],
            'user' => $user->id,
        ];

        $insert = new Specialties($data);
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
