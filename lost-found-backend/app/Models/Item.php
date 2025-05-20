<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'title',
        'description',
        'type',
        'location',
        'contact_email',
        'contact_phone',   // include this if using it
        'image_path',
    ];
}

