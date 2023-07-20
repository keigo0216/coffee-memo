<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinaryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coffee_id',
        'image'
    ];
}
