<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stok_farmasi', function (Blueprint $table) {
            $table->bigIncrements('id_stok');
            $table->unsignedBigInteger('id_obat');
            $table->integer('qty')->default(0);
            $table->integer('stok_minimal')->default(0);
            $table->string('lokasi', 50)->default('FARMASI');

            $table->foreign('id_obat')
                ->references('id_obat')->on('obat')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stok_farmasi');
    }
};
