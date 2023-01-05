<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * Get the gallery for the news.
     */
    public function gallery()
    {
        return $this->hasMany('App\NewsGallery', 'news_id', 'id');
    }  
}
