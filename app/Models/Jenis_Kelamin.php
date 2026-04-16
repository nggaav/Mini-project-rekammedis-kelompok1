<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_Kelamin extends Model
{
    protected $table = 'jenis_kelamin';
    protected $fillable = ['deskripsi'];
    public $timestamps = false;
}
