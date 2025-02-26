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
        Schema::create('products_memories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable(false)->constrained(table: 'products', indexName: 'products_memories_products_id')->cascadeOnDelete();
            $table->foreignId('memory_id')->nullable(false)->constrained(table: 'memories', indexName: 'products_memories_memory_id')->cascadeOnDelete();
            $table->unique(['product_id', 'memory_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_memories');
    }
};
