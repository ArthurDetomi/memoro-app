<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Memory extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'title',
        'images'
    ];


    protected $with = [
        'images'
    ];

    public function images()
    {
        return $this->hasMany(ImageMemory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, "products_memories", "memory_id", "product_id");
    }
}
