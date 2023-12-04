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
        Schema::create('pedagangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('pasar_id');
            $table->string('nama_pedagang');

            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->foreign('pasar_id')->references('id')->on('pasars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedagangs');
    }
};
