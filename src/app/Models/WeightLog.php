<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

     public function WeightLog()
     {
        return $this->belongsTo(WeightLog::class);
     }
}
