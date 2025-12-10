<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'plant_id',
        'image_path',
        'feature_vector',
    ];

    protected $casts = [
        'feature_vector' => 'array',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
