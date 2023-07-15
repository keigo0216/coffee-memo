<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'brewing_method_id',
        'country_id',
        'way_to_drink_id',
        'name',
        'evaluation',
        'shop',
        'roast_level',
        'scent_level',
        'bitterness_level',
        'acidity_level',
        'sweetness_level',
        'clearness_level',
        'rich_level',
        'aftertaste_level',
        'aftercooled_level',
        'note',
        'img',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
