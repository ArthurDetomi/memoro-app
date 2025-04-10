<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_types';

    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
