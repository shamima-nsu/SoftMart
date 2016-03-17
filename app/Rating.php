<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = ['giver', 'receiver', 'value'];
   
    protected $guarded= [];

    public function ratingOrmUserGiver()
    {
    	return $this->hasOne('App\User');
    }

    public function ratingOrmUserReceiver()
    {
    	return $this->belongsTo('App\User');
    }

}
