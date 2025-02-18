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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 255)->nullable(false);
            $table->foreignId('type_id')->nullable(false)->constrained(table: 'products_types', indexName: 'features_products_types_id')->cascadeOnDelete();
            $table->boolean('is_default')->nullable(false)->default(false);
            $table->string('description', length: 255)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
