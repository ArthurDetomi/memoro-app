<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    protected $fillable = [
        'name',
        'is_default'
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }


    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }
}
