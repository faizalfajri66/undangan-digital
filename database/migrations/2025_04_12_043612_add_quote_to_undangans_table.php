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
            $table->text('quote')->nullable();
            $table->string('sumber_quote')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('undangans', function (Blueprint $table) {
            $table->dropColumn(['quote', 'sumber_quote']);
        });
    }
};
