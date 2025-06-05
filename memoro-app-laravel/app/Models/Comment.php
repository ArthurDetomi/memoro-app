<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'content',
        'memory_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function memory()
    {
        return $this->belongsTo(Memory::class);
    }
}
