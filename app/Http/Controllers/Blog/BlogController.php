<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\InsertBlogRequest;
use App\Http\Responses\ApiResponse;
use App\Services\Blog\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    private $service;

    /**
     * BlogController constructor.
     * @param BlogService $blogService
     */
    public function __construct(BlogService $blogService)
    {
        $this->service = $blogService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = $this->service
            ->findAll();
        return view('pages.blog')->with(['blogs' => $blogs]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('manage.insertBlog');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $blog = $this->service
            ->find($id);
        return view('pages.ThisBlog')
            ->with(['blog' => $blog]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function list()
    {
        $blogs = $this->service
            ->findAll();
        return view('manage.listBlogs')->with(['blogs' => $blogs]);
    }

    /**
     * @param InsertBlogRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(InsertBlogRequest $request){
        try{
            $this->service
                ->insert($request->all());
            return redirect()->route('blog.create')->with('sucess','Blog inserido com sucesso');
        }catch (\Exception $exception){
            return redirect()->route('blog.create')->with('error','Erro ao inserir blog '.$exception->getMessage());
        }
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
