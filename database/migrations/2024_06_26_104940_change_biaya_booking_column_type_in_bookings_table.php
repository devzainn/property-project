<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBiayaBookingColumnTypeInBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Ubah tipe data kolom 'biaya_booking' menjadi integer
            $table->integer('biaya_booking')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Kembalikan tipe data kolom 'biaya_booking' ke decimal jika perlu
            $table->decimal('biaya_booking', 8, 2)->change();
        });
    }
}