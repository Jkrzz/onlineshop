<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['name','description','slug','price','instock'];
    public function category(){
        return $this->belongsTo('App\admin\Category','category_id');
    }
    public function order(){
        return $this->hasMany('App\admin\Order','post_id');
    }
}