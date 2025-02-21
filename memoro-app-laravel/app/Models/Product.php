<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'pairing'
    ];

    public function getImageUrl()
    {
        return url('storage/' . $this->image);
    }
}
