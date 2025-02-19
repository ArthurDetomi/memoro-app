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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 255)->nullable(false);
            $table->string('image', length: 255)->nullable()->default(null);
            $table->foreignId('user_id')->nullable(false)->constrained(table: 'users', indexName: 'products_user_id')->cascadeOnDelete();
            $table->foreignId('type_id')->nullable(false)->constrained(table: 'products_types', indexName: 'products_products_types_id')->cascadeOnDelete();
            $table->string('description', length: 255)->nullable()->default(null);
            $table->date('expiration')->nullable()->default(null);
            $table->string('producer', length: 255)->nullable()->default(null);
            $table->string('pairing', length: 255)->nullable()->default(null);
            $table->string('country', length: 255)->nullable()->default(null);
            $table->string('brand', length: 255)->nullable()->default(null);
            $table->unsignedInteger('quantity')->nullable(false)->default(0);
            $table->decimal('weight', total: 10, places: 2)->nullable()->default(null);
            $table->string('unit_of_measure', length: 10)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
