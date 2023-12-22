<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'likes',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}