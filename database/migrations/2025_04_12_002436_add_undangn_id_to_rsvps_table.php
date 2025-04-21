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
        Schema::table('rsvps', function (Blueprint $table) {
            // Menambahkan kolom undangan_id yang berelasi dengan tabel undangans
            $table->foreignId('undangan_id')->constrained('undangans')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rsvps', function (Blueprint $table) {
            //
        });
    }
};
