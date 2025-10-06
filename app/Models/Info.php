<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'logo',
        'footer_logo',
        'favicon',
        'description',
        'site_keywords',
        'email',
        'phone',
        'address',
        'is_appointment'
    ];
}
