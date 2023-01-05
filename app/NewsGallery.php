<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsGallery extends Model
{
    /**
     * Get the news that owns the gallery.
     */
    public function news()
    {
        return $this->belongsTo('App\News');
    }   
}
