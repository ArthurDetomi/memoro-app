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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable(false)->constrained(table: 'products', indexName: 'product_reviews_products_id')->cascadeOnDelete();
            $table->foreignId('review_id')->nullable(false)->constrained(table: 'reviews', indexName: 'product_reviews_reviews_id')->cascadeOnDelete();
            $table->unsignedTinyInteger('rating')->nullable(false);
            $table->string('comment', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
