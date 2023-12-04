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
        Schema::create('alasan_kenaikan_harga_jombangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surveyor_id');
            $table->unsignedBigInteger('pasar_id');
            $table->date('tanggal_input');
            $table->unsignedBigInteger('komoditas_id');
            $table->unsignedBigInteger('reason_id');
            $table->decimal('hargaKemarin', 10, 2);
            $table->decimal('hargaHariIni', 10, 2);
            $table->decimal('perubahanHarga', 10, 2);

            $table->foreign('komoditas_id')->references('id')->on('komoditas')->onDelete('cascade');
            $table->foreign('surveyor_id')->references('id')->on('data_surveyors')->onDelete('cascade');
            $table->foreign('pasar_id')->references('id')->on('pasars')->onDelete('cascade');
            $table->foreign('reason_id')->references('id')->on('reason_jombangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alasan_kenaikan_harga_jombangs');
    }
};
