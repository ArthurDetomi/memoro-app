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
        Schema::table('users', function (Blueprint $table) {
            $table->string('image', length: 255)->nullable()->default(null);
            $table->string('country', 255)->nullable()->default(null);
            $table->string('profession', 255)->nullable()->default(null);
            $table->string('short_bio', 255)->nullable()->default(null);
            $table->date('birth_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('country');
            $table->dropColumn('profession');
            $table->dropColumn('short_bio');
            $table->dropColumn('birth_date');
        });
    }
};
