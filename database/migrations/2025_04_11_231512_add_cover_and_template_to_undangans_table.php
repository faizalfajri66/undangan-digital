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
            $table->string('cover')->nullable();
            $table->string('template')->nullable();
        });
    }
    
    public function down(): void
    {
        Schema::table('undangans', function (Blueprint $table) {
            $table->dropColumn(['cover', 'template']);
        });
    }    
};
