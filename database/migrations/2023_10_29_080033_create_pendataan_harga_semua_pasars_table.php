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
        Schema::create('pendataan_harga_semua_pasars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surveyor_id');
            $table->unsignedBigInteger('pasar_id');
            $table->date('tanggal_input');
            $table->unsignedBigInteger('komoditas_id');
            $table->unsignedBigInteger('pendataan_ps_ciputats_id');
            $table->unsignedBigInteger('pendataan_ps_cimanggis_id');
            $table->unsignedBigInteger('pendataan_ps_jengkols_id');
            $table->unsignedBigInteger('pendataan_ps_serpongs_id');
            $table->unsignedBigInteger('pendataan_ps_jombangs_id');
            $table->unsignedBigInteger('pendataan_ps_cegers_id');
            $table->decimal('average_harga', 10, 2);


            $table->foreign('surveyor_id')->references('id')->on('data_surveyors');
            $table->foreign('pasar_id')->references('id')->on('pasars');
            $table->foreign('komoditas_id')->references('id')->on('komoditas');
            $table->foreign('pendataan_ps_ciputats_id')->references('id')->on('pendataan_ps_ciputats');
            $table->foreign('pendataan_ps_cimanggis_id')->references('id')->on('pendataan_ps_cimanggis');
            $table->foreign('pendataan_ps_jengkols_id')->references('id')->on('pendataan_ps_jengkols');
            $table->foreign('pendataan_ps_serpongs_id')->references('id')->on('pendataan_ps_serpongs');
            $table->foreign('pendataan_ps_jombangs_id')->references('id')->on('pendataan_ps_jombangs');
            $table->foreign('pendataan_ps_cegers_id')->references('id')->on('pendataan_ps_cegers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendataan_harga_semua_pasars');
    }
};
