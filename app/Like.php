<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
   protected $table = 'likes';

   
    protected $fillable = ['userId', 'postId'];

    protected $guarded= [];


    public function likeOrmUser()
    {
    	return $this->belongsTo('App\User');
    }

    public function likeormPost()
    {
    	return $this->belongsTo('App\Post');
    }

}
