<?php


namespace App\Services\Blog;


use App\Models\Blog\Blog;
use App\Repositories\Blog\BlogRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogService
{
    private $repository;

    /**
     * BlogService constructor.
     * @param BlogRepository $blogRepository
     */
    public function __construct(BlogRepository $blogRepository)
    {
        $this->repository = $blogRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function findAll()
    {
        return $this->repository->all()->sortDesc();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }


    /**
     * @param array $request
     * @return Blog
     */
    public function insert(array $request)
    {
        $user = Auth::user();
        $filename =
            \Storage::disk('public')->putFile('blog',$request['image']);

        $path_image = $filename;

        $data = [
            'image' => $path_image,
            'title' => $request['title'],
            'content' => $request['content'],
            'user' => $user->id,
        ];

        $insert = new Blog($data);
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
