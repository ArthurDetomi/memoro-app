<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function memories(): BelongsToMany
    {
        return $this->belongsToMany(Memory::class);
    }
}
