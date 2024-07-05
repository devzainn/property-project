<?php

use App\Models\Spouse;
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
        Schema::table('spouses', function (Blueprint $table) {
            $table->unsignedBigInteger('buyer_id');        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spouses', function (Blueprint $table) {
            $table->dropColumn('buyer_id');
        });
    }
};
