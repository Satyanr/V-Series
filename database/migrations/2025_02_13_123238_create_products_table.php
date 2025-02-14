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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('pixel_pitch')->nullable();
            $table->string('panel_dimension')->nullable();
            $table->string('panel_resolution')->nullable();
            $table->string('module_dimension')->nullable();
            $table->string('module_resolution')->nullable();
            $table->string('brightness')->nullable();
            $table->string('refresh_rate')->nullable();
            $table->string('color_temperatur')->nullable();
            $table->string('viewing_angle')->nullable();
            $table->string('power_consumption')->nullable();
            $table->string('storage_temperature')->nullable();
            $table->string('operation_temperature')->nullable();
            $table->string('storage_humidity')->nullable();
            $table->string('operation_humidity')->nullable();
            $table->string('ip_rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
