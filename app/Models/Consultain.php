<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultain extends Model
{
     protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'service_id',
    ];

    // Relationships
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
