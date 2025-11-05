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


        Schema::create('data_pelanggaran_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            
            // relasi ke tabel jenis_pelanggaran
            $table->foreignId('id_pelanggaran')
                ->constrained('jenis_pelanggaran')
                ->onDelete('cascade');
            
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pelanggaran_siswa');
    }
};
