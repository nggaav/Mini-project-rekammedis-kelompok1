<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien'; // Pastikan nama tabelnya pasien
    public $timestamps = false;  // Matikan timestamps biar gak error updated_at

    // Tambahkan semua kolom dari diagram Kak Nurul di sini
    protected $fillable = [
        'nama_pasien',
        'nik',
        'tanggal_lahir',
        'usia',
        'no_hp',
        'alamat',
        'keterangan',
        'desa_id',
        'jenis_kelamin_id'
    ];

    public function jenis_kelamin()
    {
        return $this->belongsTo(Jenis_Kelamin::class, 'jenis_kelamin_id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id');
    }
}
