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
        'footer_description',
        'seo_keywords',
        'seo_description',
        'email',
        'phone',
        'fax',
        'business_hours',
        'address',
        'is_appointment'
    ];
}
