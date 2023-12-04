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
        Schema::create('pendataan_ps_jombangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surveyor_id');
            $table->unsignedBigInteger('pasar_id');
            $table->date('tanggal_input');
            $table->unsignedBigInteger('komoditas_id');
            $table->decimal('harga_pedagang_1', 10, 2);
            $table->decimal('harga_pedagang_2', 10, 2);
            $table->decimal('harga_pedagang_3', 10, 2);
            $table->decimal('average_harga', 10, 2);

            $table->foreign('komoditas_id')->references('id')->on('komoditas');
            $table->foreign('surveyor_id')->references('id')->on('data_surveyors');
            $table->foreign('pasar_id')->references('id')->on('pasars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendataan_ps_jombangs');
    }
};
