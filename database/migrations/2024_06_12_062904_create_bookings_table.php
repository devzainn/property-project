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
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id'); // Menggunakan bigIncrements untuk primary key
            $table->string('nama_marketing');
            $table->decimal('biaya_booking', 10, 2);
            $table->enum('metode_bayar', ['cash', 'transfer']);
            $table->time('jam_booking');
            $table->text('keterangan')->nullable();
            $table->enum('status_pengajuan', ['kosong', 'booking', 'reject', 'SP3K', 'kantor', 'bank', 'banding', 'rencana_akad', 'akad']);
            $table->integer('penawaran_harga');
            $table->unsignedBigInteger('buyer_id'); // Pastikan tipe data cocok dengan kolom referenced
            $table->unsignedBigInteger('spouse_id');
            $table->unsignedBigInteger('property_id'); // Pastikan tipe data cocok dengan kolom referenced
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
