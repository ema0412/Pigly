<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightTarget extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'weight_targets_table';

    public function WeightLog()
    {
       return $this->belongsTo(WeightTarget::class);
    }
=======
    protected $gurded = [
        'id',
    ];
>>>>>>> origin/main
}
