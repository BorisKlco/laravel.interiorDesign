<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, Image_tag::class);
    }
}
