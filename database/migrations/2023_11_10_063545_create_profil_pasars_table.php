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
        Schema::create('profil_pasars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasar_id');
            $table->text('sejarah');
            $table->string('alamat');
            $table->string('jam');
            $table->string('luas');
            $table->string('kios');
            $table->string('jenisBarang');

            $table->foreign('pasar_id')->references('id')->on('pasars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_pasars');
    }
};
