<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    /**
     * Get the Project that owns the image.
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }    
}
