<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Services\Specialty\SpecialtyService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('manage.manager');
    }

    /**
     * @param SpecialtyService $specialtyService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function specialty(SpecialtyService $specialtyService)
    {
        $specialties = $specialtyService->findAll();
        return view('manage.specialty')->with(['specialties' => $specialties]);
    }


}
