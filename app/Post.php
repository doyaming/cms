<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Post extends Model
{
    //
    protected $fillable = ['title','content'];

    use SoftDeletes;

    function user(){
        return $this->belongsTo('App\User');
    }
    function category(){
    return $this->belongsTo('App\Category');



 }
}

