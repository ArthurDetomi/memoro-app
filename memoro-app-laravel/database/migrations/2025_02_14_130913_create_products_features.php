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
        Schema::create('products_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable(false)->constrained(table: 'products', indexName: 'products_features_products_id')->cascadeOnDelete();
            $table->foreignId('feature_id')->nullable(false)->constrained(table: 'features', indexName: 'products_features_features_id')->cascadeOnDelete();
            $table->string('value', length: 255)->nullable(false);

            $table->unique(['product_id', 'feature_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_features');
    }
};
