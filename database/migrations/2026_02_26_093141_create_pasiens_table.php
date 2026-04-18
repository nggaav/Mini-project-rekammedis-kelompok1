<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('no_hp')->nullable();

            // Foreign Key
            $table->foreignId('desa_id')
                ->constrained('desas')
                ->onDelete('cascade');

            $table->foreignId('jenis_kelamin_id')
                ->constrained('jenis_kelamins')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};