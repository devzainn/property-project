<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNotariesTable extends Migration
{
    public function up()
    {
        Schema::table('notaries', function (Blueprint $table) {
            // Mengubah tipe kolom no_sk menjadi VARCHAR(50)
            $table->string('no_sk', 50)->change();

            // Menghapus kolom year
            $table->dropColumn('year');
        });
    }

    public function down()
    {
        Schema::table('notaries', function (Blueprint $table) {
            // Mengembalikan tipe kolom no_sk ke tipe sebelumnya jika diperlukan
            $table->string('no_sk')->change();

            // Menambahkan kembali kolom year jika rollback
            $table->year('year');
        });
    }
}