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
        Schema::table('buyers', function (Blueprint $table) {
            $table->renameColumn('id', 'buyer_id');
        });

        Schema::table('spouses', function (Blueprint $table) {
            $table->renameColumn('id', 'spouse_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buyers', function (Blueprint $table) {
            $table->renameColumn('buyer_id', 'id');
        });

        Schema::table('spouses', function (Blueprint $table) {
            $table->renameColumn('spouse_id', 'id');
        });
    }
};
