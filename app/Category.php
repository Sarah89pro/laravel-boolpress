<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //RELATION with POSTS (categories-posts) one to many
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
