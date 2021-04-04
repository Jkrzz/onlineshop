<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['cname','phone','instock','post_id'];
    public function post(){
        return $this->belongsTo('App\admin\Post','post_id');
    }
}