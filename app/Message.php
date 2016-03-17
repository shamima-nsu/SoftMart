<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

   
    protected $fillable = ['mainMsgId', 'receiver', 'sender', 'content', 'filename'];

    protected $guarded= [];


    public function messageOrmDeleteHistory()
    {
    	return $this->hasOne('App\Delete_history'); 
    }

    public function messageOrmMainMessage()
    {
    	return $this->belongsTo('App\Message');
    }

    public function messageOrmUserSender()
    {
    	return $this->hasOne('App\User');
    }

    public function messageOrmUserReceiver()
    {
    	return $this->hasOne('App\User');
    }
    
    public function mainMessageOrmMessage()
    {
    	return $this->hasMany('App\Message');
    }





}
