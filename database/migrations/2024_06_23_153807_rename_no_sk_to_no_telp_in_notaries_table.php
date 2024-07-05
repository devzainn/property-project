<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameNoSkToNoTelpInNotariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notaries', function (Blueprint $table) {
            $table->renameColumn('no_sk', 'no_telp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notaries', function (Blueprint $table) {
            $table->renameColumn('no_telp', 'no_sk');
        });
    }
}
