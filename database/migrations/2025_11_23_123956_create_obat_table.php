<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('obat');
    }

    public function down(): void
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->bigIncrements('id_obat');
            $table->string('kode_obat', 50)->unique();
            $table->string('nama_obat', 150);
            $table->string('bentuk', 50)->nullable();
            $table->integer('satuan');
            $table->string('kategori', 100)->nullable();
            $table->decimal('harga_jual', 12, 2);
            $table->boolean('status_aktif')->default(true);
        });
    }
};
