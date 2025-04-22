<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMemory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_memories';

    protected $fillable = [
        'product_id',
        'memory_id',
    ];
}
