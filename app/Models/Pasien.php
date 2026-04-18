<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens'; // sesuaikan dengan nama tabel

    protected $fillable = [
        'nama',
        'nik',
        'tanggal_lahir',
        'alamat',
        'desa_id',
        'jenis_kelamin_id',
        'no_hp'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }
}