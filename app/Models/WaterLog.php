<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'tank_id',
        'logged_at',
        'ph',
        'temperature',
        'no3',
        'other_params',
    ];

    protected $casts = [
        'logged_at'    => 'datetime',
        'other_params' => 'array',
    ];

    public function tank()
    {
        return $this->belongsTo(Tank::class);
    }
}
