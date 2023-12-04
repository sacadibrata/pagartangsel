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
        Schema::create('reason_cimanggis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alasan');
            $table->unsignedBigInteger('komoditas_id');
            $table->foreign('komoditas_id')->references('id')->on('komoditas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reason_cimanggis');
    }
};
