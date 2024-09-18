<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apiblog extends Model
{
    use HasFactory;


    protected $table = 'blogs';

    protected $fillable = [
    'title',
    'content',
    'category',
    'tags'
    ];

    protected $casts = [
        'tags' => 'array',
    ];

}
