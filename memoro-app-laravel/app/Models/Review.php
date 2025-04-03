<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
