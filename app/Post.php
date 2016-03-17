<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

   
    protected $fillable = ['userId', 'title', 'description', 'filename', 'status', 'visible', 'deadline', 'categoryId', 'duration'];


    protected $guarded= [];


    public function postOrmComment()
    {
        return $this->hasMany('App\Comment');
    }

    public function postOrmUser()
    {
    	return $this->belongsTo('App\User');
    }

    public function postOrmCategory()
    {
    	return $this->hasOne('App\Software_category');
    }

    public function postOrmQuotation()
    {
        return $this->hasMany('App\Quotation');
    }

    public function postOrmLike()
    {
        return $this->hasMany('App\Like');
    }

}
