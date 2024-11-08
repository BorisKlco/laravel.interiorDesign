<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function images()
    {
        return $this->belongsToMany(Image::class, Image_tag::class);
    }
}
