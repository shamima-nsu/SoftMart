<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

   
    protected $fillable = ['postId', 'userId', 'content'];


    protected $guarded= [];

    public function commentOrmUser()
    {
        return $this->belongsTo('App\User');
    }

    public function commentOrmPost()
    {
    	return $this->belongsTo('App\Post');
    }

}
