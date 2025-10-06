<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'consultain_id',
        'start_time',
        'end_time',
        'slot',
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
    ];

    public function consultain()
    {
        return $this->belongsTo(Consultain::class);
    }
}
