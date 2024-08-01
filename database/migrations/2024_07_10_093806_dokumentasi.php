<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->id(); // 'id' sudah default sebagai kolom primary key
            $table->string('judul');
            $table->string('deskripsi');  // Menggunakan integer untuk nomor
            $table->string('foto');
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }        

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasi');
    }
};
