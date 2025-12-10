<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'ph_min',
        'ph_max',
        'temp_min',
        'temp_max',
        'light_level',
        'difficulty',
        'image_sample',
        'care_guide',
    ];

    public function tankPlants()
    {
        return $this->hasMany(TankPlant::class);
    }

    public function images()
    {
        return $this->hasMany(PlantImage::class);
    }
}
