<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    public function post(){
        return $this->belongsTo('App\admin\Post','post_id');
    }
}