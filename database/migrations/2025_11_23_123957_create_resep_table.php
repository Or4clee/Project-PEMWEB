<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->bigIncrements('id_resep');
            $table->unsignedBigInteger('id_kunjungan')->nullable(); // dari sistem klinik
            $table->unsignedBigInteger('id_pasien')->nullable();    // dari sistem klinik
            $table->unsignedBigInteger('id_dokter')->nullable();    // dari sistem klinik
            $table->date('tgl_resep');
            $table->string('status_resep', 20)->default('baru');    // baru / selesai / batal
            $table->string('jenis_resep', 50);
            $table->text('catatan_dokter')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resep');
    }
};
