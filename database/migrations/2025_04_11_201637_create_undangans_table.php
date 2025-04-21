<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // e.g., serenade-moss
            $table->string('nama_tamu')->nullable(); // jika dikirimkan dari URL
            $table->string('nama_pria');
            $table->string('nama_wanita');
            $table->string('foto_pria')->nullable();
            $table->string('foto_wanita')->nullable();
            $table->text('kata_pengantar')->nullable();
            $table->dateTime('tanggal_acara');
            $table->string('lokasi');
            $table->text('link_maps')->nullable();
            $table->text('musik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('undangans');
    }
};
