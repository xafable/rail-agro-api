<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

    function subServices(){
        return $this->hasMany(SubService::class);
    }
}
