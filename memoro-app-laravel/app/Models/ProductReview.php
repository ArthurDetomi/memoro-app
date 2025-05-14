<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReview extends Model
{

    protected $fillable = [
        'product_id',
        'rating',
        'comment',
        'review_id'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function reviews(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }
}
