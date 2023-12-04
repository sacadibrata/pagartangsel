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
        Schema::create('gabung_data', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_input');
            $table->unsignedBigInteger('pasar_id');
            $table->unsignedBigInteger('komoditas_id');
            $table->decimal('average_harga', 10, 2);

            $table->foreign('komoditas_id')->references('id')->on('komoditas');
            $table->foreign('pasar_id')->references('id')->on('pasars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gabung_data');
    }
};
