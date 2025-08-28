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
        $table->string('instagram_wanita')->nullable();
        $table->string('instagram_pria')->nullable();
        $table->decimal('latitude_acara', 10, 7)->nullable();  // format decimal untuk koordinat
        $table->decimal('longitude_acara', 10, 7)->nullable();
    });
}

public function down(): void
{
    Schema::table('undangans', function (Blueprint $table) {
        $table->dropColumn([
            'instagram_wanita',
            'instagram_pria',
            'latitude_acara',
            'longitude_acara',
        ]);
    });
}

};
