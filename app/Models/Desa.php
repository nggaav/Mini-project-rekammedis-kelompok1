<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    // Kasih tahu Laravel kalau nama tabelnya 'desa' (bukan desas)
    protected $table = 'desa';
    public $timestamps = false;

    // Kolom yang boleh diisi
    protected $fillable = ['nama_desa'];
}
