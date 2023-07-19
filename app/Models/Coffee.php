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
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function brewing_method()
    {
        return $this->belongsTo(BrewingMethod::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function way_to_drink()
    {
        return $this->belongsTo(WayToDrink::class);
    }

    public function binary_image()
    {
        return $this->hasOne(BinaryImage::class);
    }
}
