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
        Schema::table('products', function (Blueprint $table) {
            $table->date('expiration')->nullable()->default(null);
            $table->string('producer')->nullable()->default(null);
            $table->string('storage')->nullable()->default(null);
            $table->string('region')->nullable()->default(null);
            $table->string('brand')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('expiration');
            $table->dropColumn('producer');
            $table->dropColumn('storage');
            $table->dropColumn('region');
            $table->dropColumn('brand');
        });
    }
};
