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
        Schema::create('love_stories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('undangan_id')->constrained()->onDelete('cascade');
            $table->string('judul');
            $table->text('cerita');
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('love_stories');
    }
};
