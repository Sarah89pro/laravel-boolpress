<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //fillable
    protected $fillable = [
        'title',
        'slug',
        'category_id', //added with the category update
        'content',
        'cover'
    ];



    //RELATION with CATEGORIES (posts-categories) one to many
    public function category() {
        return $this->belongsTo('App\Category');
    }


    //RELATION with TAGS (posts-tags) many to many
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

}
