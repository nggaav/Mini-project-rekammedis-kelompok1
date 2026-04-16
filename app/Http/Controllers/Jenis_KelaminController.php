<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis_Kelamin;
use Illuminate\Support\Facades\Route;

class Jenis_KelaminController extends Controller
{
public function index() {
    $datajenis_Kelamin = Jenis_Kelamin::all();
    $datajenis_Kelamin = \App\Models\Jenis_Kelamin::all();
    $dataDesa = \App\Models\Desa::all();
    $dataPasien = \App\Models\Pasien::with(['jenis_kelamin', 'desa'])->get();
    return view('jenis_kelamin.index', compact('dataDesa', 'datajenis_Kelamin', 'dataPasien'));
}

   public function store(Request $request)
{    $request->validate([
        'nama_Jenis_Kelamin' => 'required|unique:jenis_kelamin,nama_jenis_kelamin',
    ]);
{
    Jenis_Kelamin::create([
        'nama_jenis_kelamin' => $request->nama_Jenis_Kelamin,
    ]);

    return redirect()->back()->with('success', 'Data berhasil disimpan!');
}
}

    // 3. Menghapus data
    public function destroy($id)
    {
        Jenis_Kelamin::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
