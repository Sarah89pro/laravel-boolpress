<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
      //RELATION with POSTS (tags-posts) many to many
      public function posts() {
        return $this->belongsToMany('App\Post');
    }
}
