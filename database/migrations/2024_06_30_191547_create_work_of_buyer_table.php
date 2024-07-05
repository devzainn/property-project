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
        Schema::create('work_of_buyer', function (Blueprint $table) {
            $table->id();
            $table->string('nama_instansi');
            $table->string('kota');
            $table->enum('status_pekerjaan', ['tetap', 'magang', 'freelance', 'lainnya']);
            $table->string('jabatan');
            $table->integer('gaji');
            $table->foreignId('buyer_id')->constrained('buyers', 'buyer_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_of_buyer');
    }
};
