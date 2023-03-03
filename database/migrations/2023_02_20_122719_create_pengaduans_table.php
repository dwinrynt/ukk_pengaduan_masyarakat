<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('masyarakat_id');
            $table->foreignId('petugas_id')->nullable();
            $table->foreignId('kategori_id');
            $table->longText('laporan');
            $table->string('path_foto')->nullable();
            $table->enum('status', ['menunggu verifikasi', 'proses', 'selesai'])->default('menunggu verifikasi')->nullable();
            $table->date('tanggal_pengaduan');
            $table->date('tanggal_tanggapan')->nullable();
            $table->longText('tanggapan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
};
