<?php

namespace App\Http\Controllers\User;

use App\Constants\UserConstant;
use App\Constants\UserStatusConstant;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\InsertUser;
use App\Http\Responses\ApiResponse;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $request = $request->all();

        if(!isset($request['email']))
            return ApiResponse::error('','Email é um campo válido','false');

        if(!isset($request['password']))
            return ApiResponse::error('','Senha é um campo válido','false');

        try{
            $user = $this->service
                ->authenticate($request);
        }catch (\Exception $e){
            return ApiResponse::error('',$e->getMessage());
        }

        return ApiResponse::success($user,'Usuário logado');
    }

    /**
     * @param InsertUser $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(InsertUser $request)
    {
        try{
            $insert = $this
                ->service
                ->insertUser($request->all());
        }catch (\Exception $exception){
            return redirect()->route('settings.listUSer')
                ->with('error', $exception->getMessage());
        }
        return redirect()->route('settings.listUSer')
            ->with('success', 'Usuário inserido com sucesso');
    }

}
