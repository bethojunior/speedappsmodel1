<?php

namespace App\Http\Controllers\Specialties;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialty\InsertSpecialtyRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Specialties\Specialties;
use App\Services\Specialty\SpecialtyService;
use Illuminate\Http\Request;

class SpecialtiesController extends Controller
{

    private $service;

    /**
     * SpecialtiesController constructor.
     * @param SpecialtyService $specialtyService
     */
    public function __construct(SpecialtyService $specialtyService)
    {
        $this->service = $specialtyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param InsertSpecialtyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(InsertSpecialtyRequest $request)
    {
        try{
            $this->service
                ->insert($request->all());
            return redirect()->route('settings.showSpecialty')->with('sucess','Blog inserido com sucesso');
        }catch (\Exception $exception){
            return redirect()->route('settings.showSpecialty')->with('error','Erro ao inserir especialidade '.$exception->getMessage());
        }
    }

    /**
     * * Display the specified resource.
     * @param Specialties $specialties
     */

    public function show(Specialties $specialties)
    {
        //
    }

    /**
     * @param Specialties $specialties
     *  Show the form for editing the specified resource.
     */
    public function edit(Specialties $specialties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Specialties $specialties
     */
    public function update(Request $request, Specialties $specialties)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try{
            $delete = $this->service
                ->delete($id);
        }catch (\Exception $exception){
            return ApiResponse::error('',$exception->getMessage());
        }

        return ApiResponse::success($delete,'Especialidade excluida com sucesso');
    }
}
