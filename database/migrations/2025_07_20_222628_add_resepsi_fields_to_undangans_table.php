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
        Schema::table('undangans', function (Blueprint $table) {
            $table->dateTime('tanggal_resepsi')->nullable();
            $table->string('link_maps_resepsi')->nullable();
            $table->string('lokasi_resepsi')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('undangans', function (Blueprint $table) {
            //
        });
    }
};
