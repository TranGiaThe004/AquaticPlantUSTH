<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankPlant extends Model
{
    use HasFactory;

    protected $fillable = [
        'tank_id',
        'plant_id',
        'planted_at',
        'note',
    ];

    protected $casts = [
        'planted_at' => 'date',
    ];

    public function tank()
    {
        return $this->belongsTo(Tank::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function plantLogs()
    {
        return $this->hasMany(PlantLog::class);
    }
}
