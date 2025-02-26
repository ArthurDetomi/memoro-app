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
        Schema::create('images_memories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('memory_id')->nullable(false)->constrained(table: 'memories', indexName: 'images_memories_memory_id')->cascadeOnDelete();
            $table->string('image', length: 255)->nullable(false)->default(null);
            $table->string('caption', length: 255)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images_memories');
    }
};
