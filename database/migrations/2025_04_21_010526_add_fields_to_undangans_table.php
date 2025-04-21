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
        Schema::table('undangans', function (Blueprint $table) {
            $table->string('ayah_pria')->nullable();
            $table->string('ibu_pria')->nullable();
            $table->string('ayah_wanita')->nullable();
            $table->string('ibu_wanita')->nullable();
            $table->string('rekening_nama')->nullable();
            $table->string('rekening_bank')->nullable();
            $table->string('rekening_nomor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('undangans', function (Blueprint $table) {
            $table->dropColumn([
                'ayah_pria',
                'ibu_pria',
                'ayah_wanita',
                'ibu_wanita',
                'rekening_nama',
                'rekening_bank',
                'rekening_nomor',
            ]);
        });
    }
};
