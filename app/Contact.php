<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //mass assignement
    protected $fillable= [
        'name',
        'email',
        'message'
    ];
}
