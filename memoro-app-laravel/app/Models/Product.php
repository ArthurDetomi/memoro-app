<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;


class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
        'user_id',
        'type_id',
        'description',
        'quantity',
        'weight',
        'unit_of_measure',
        'expiration',
        'producer',
        'storage',
        'region',
        'brand',
        'production_date',
        'pairing',
        'average_rating'
    ];

    protected $with = [
        'type'
    ];

    public function getImageUrl()
    {
        if ($this->image) {
            return url('storage/' . $this->image);
        }

        $typeName = $this->type->name;

        return asset("images/products/$typeName.png");
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function features(): HasMany
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function memories(): BelongsToMany
    {
        return $this->belongsToMany(Memory::class, "products_memories", "product_id", "memory_id");
    }

    protected static function booted()
    {
        static::deleting(function ($product) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        });
    }
}
