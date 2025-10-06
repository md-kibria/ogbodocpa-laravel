<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'service_id',
        'consultain_id',
        'date',
        'schedule_id',
        'user_id',
        'client_name',
        'client_email',
        'client_phone',
        'notes',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function consultain()
    {
        return $this->belongsTo(Consultain::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
