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
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('property_id');
            $table->string('blok');
            $table->string('type');
            $table->decimal('luas_tanah', 10, 2);
            $table->decimal('luas_bangunan', 10, 2);
            $table->boolean('hoek');
            $table->unsignedBigInteger('harga');
            $table->text('keterangan')->nullable();
            $table->string('hgb_induk')->nullable();
            $table->string('hgb_pecahan')->nullable();
            $table->string('imb_induk')->nullable();
            $table->string('imb_pecahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
