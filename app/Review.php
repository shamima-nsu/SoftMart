<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table="reviews";
    protected $fillable= ['giver', 'receiver', 'content'];


    protected $guarded= [];

    public function reviewOrmUserReceiver()
    {
    	return $this->belongsTo('App\User');
    }

    public function reviewOrmUserGiver()
    {
    	return $this->hasOne('App\User');
    }
}
