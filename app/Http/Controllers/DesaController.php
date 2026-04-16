<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Jenis_Kelamin;
use App\Models\Pasien;

class DesaController extends Controller
{
    public function index()
    {
        $dataDesa = Desa::all();
        $dataJenisKelamin = Jenis_Kelamin::all();
        // Ambil data pasien untuk tabel di bawah form
        $dataPasien = Pasien::with(['jenis_kelamin', 'desa'])->get();

        return view('desa.index', compact('dataDesa', 'dataJenisKelamin', 'dataPasien'));
    }

public function store(Request $request)
{
    // Simpan data ke tabel pasien
    Pasien::create([
        'nama_pasien' => $request->nama_pasien,
        'jenis_kelamin_id' => $request->jenis_kelamin_id,
        'desa_id' => $request->desa_id,
    ]);

    return redirect()->route('desa.index')->with('success', 'Data masuk!');
}

    public function destroy($id)
    {
        // Fungsi hapus data pasien
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('desa.index')->with('success', 'Data Pasien Berhasil Dihapus!');

    }
}
