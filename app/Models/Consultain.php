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
        'services',
    ];

    // Relationships
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function services()
    {
        if (empty($this->services)) {
            return collect();
        }
        
        $serviceIds = is_string($this->services) ? json_decode($this->services, true) : $this->services;
        
        return Service::whereIn('id', $serviceIds ?? [])->get();
    }
}
