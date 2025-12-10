<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'tank_plant_id',
        'logged_at',
        'height',
        'status',
        'note',
        'image_path',
    ];

    protected $casts = [
        'logged_at' => 'date',
    ];

    public function tankPlant()
    {
        return $this->belongsTo(TankPlant::class);
    }
}
