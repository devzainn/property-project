<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchiveTable extends Migration
{
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id')->unsigned();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('spouse_id')->nullable();
            $table->unsignedBigInteger('property_id')->nullable();
            $table->unsignedBigInteger('notary_id');
            $table->unsignedBigInteger('bank_id');
            $table->boolean('form_biru')->default(false);
            $table->boolean('buku_biru')->default(false);
            $table->boolean('fc_ktp')->default(false);
            $table->boolean('fc_ktp_pasangan')->default(false);
            $table->boolean('fc_npwp')->default(false);
            $table->boolean('fc_kk')->default(false);
            $table->boolean('fc_buku_nikah')->default(false);
            $table->boolean('sk_kerja')->default(false);
            $table->boolean('slip_gaji')->default(false);
            $table->boolean('form_btn')->default(false);
            $table->boolean('rek_btn')->default(false);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('archives');
    }
}
