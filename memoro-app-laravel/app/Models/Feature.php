<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    protected $fillable = [
        'name',
        'type_id',
        'user_id',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }


    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductFeature::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
