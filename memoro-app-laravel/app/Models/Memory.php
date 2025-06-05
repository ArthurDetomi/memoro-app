<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Memory extends Model
{
    protected $fillable = [
        'description',
        'title',
        'images',
        'user_id'
    ];


    protected $with = [
        'images',
        'products',
        'user:id,name,image',
        'comments.user:id,name,image'
    ];

    protected $withCount = [
        'likes'
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

    public function likes()
    {
        return $this->belongsToMany(User::class, 'memory_like')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeSearch($query, $search = '')
    {
        if (trim($search) === '') {
            return;
        }

        $query->where(function ($q) use ($search) {
            $q->where('description', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%');
        });
    }
}
