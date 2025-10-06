<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'seo_keywords',
        'seo_description',
        'category',
    ];

    // Relationships
    public function consultains()
    {
        return $this->hasMany(Consultain::class);
    }
}
