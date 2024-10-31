<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    //

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
