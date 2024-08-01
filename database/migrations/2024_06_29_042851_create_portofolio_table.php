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
        Schema::create('portofolio', function (Blueprint $table){
            $table->id('id');
            $table->string('nama_paket_perkerjaan');
            $table->string('pejabat_pembuat_komitmen');
            $table->string('harga_kontrak'); // Menggunakan tipe string untuk nomor dan huruf
            $table->string('lokasi');
            $table->year('tahun'); // Tipe data year bisa digunakan untuk menyimpan tahun
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portofolio');
    }
};
