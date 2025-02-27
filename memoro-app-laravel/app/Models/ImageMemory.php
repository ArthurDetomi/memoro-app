<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageMemory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'images_memories';

    protected $fillable = ['memory_id', 'image', 'caption'];

    public function memory()
    {
        return $this->belongsTo(Memory::class, 'memory_id');
    }
}
