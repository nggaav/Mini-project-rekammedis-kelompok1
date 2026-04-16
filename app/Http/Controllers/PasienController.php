<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien'; // Paksa pakai nama 'pasien' sesuai tabel Rani
    protected $fillable = ['nama_pasien', 'jenis_kelamin_id', 'desa_id'];

    // Relasi ke Jenis Kelamin (Laki-laki/Perempuan)
    public function jenis_kelamin() {
        return $this->belongsTo(Jenis_Kelamin::class, 'jenis_kelamin_id');
    }

    // Relasi ke Desa (Domisili)
    public function desa() {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
