<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Desa;
use App\Models\JenisKelamin;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDoctor = User::count();
        $totalPasien = Pasien::count();
        $totalDesa = Desa::count();
        $totalJenisKelamin = JenisKelamin::count();

        return view('dashboard', compact(
            'totalDoctor',
            'totalPasien',
            'totalDesa',
            'totalJenisKelamin'
        ));
    }
}