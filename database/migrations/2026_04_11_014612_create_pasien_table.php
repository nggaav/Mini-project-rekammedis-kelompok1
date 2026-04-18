<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pasien');
        $table->string('nik')->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->integer('usia')->nullable();
        $table->string('no_hp')->nullable();
        $table->text('alamat')->nullable();
        $table->text('keterangan')->nullable();
        $table->foreignId('desa_id')->constrained('desa');
        $table->foreignId('jenis_kelamin_id')->constrained('jenis_kelamin');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
