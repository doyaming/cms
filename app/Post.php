<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title','content'];
    function user(){
        return $this->belongsTo('App\User');
    }
    function category(){
    return $this->belongsTo('App\Category');



 }
}

