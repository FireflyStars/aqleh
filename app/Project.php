<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * Get the images for the project.
     */
    public function images()
    {
        return $this->hasMany('App\ProjectImage', 'project_id', 'id');
    }    
}
