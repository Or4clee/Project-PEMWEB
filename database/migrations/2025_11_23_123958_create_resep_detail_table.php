<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resep_detail', function (Blueprint $table) {
            $table->bigIncrements('id_resep_detail');
            $table->unsignedBigInteger('id_resep');
            $table->unsignedBigInteger('id_obat');
            $table->integer('jumlah_diminta');
            $table->integer('jumlah_diberi');
            $table->string('aturan_pakai', 255)->nullable();

            $table->foreign('id_resep')
                ->references('id_resep')->on('resep')
                ->onDelete('cascade');

            $table->foreign('id_obat')
                ->references('id_obat')->on('obat')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resep_detail');
    }
};
