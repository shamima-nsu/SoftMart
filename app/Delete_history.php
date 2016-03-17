<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delete_history extends Model
{
    protected $table = 'delete_history';

   
    protected $fillable = ['messageId', 'deletedBy'];

    protected $guarded= [];


    public function deleteHistoryOrmMessage()
    {
    	return $this->belongsTo('App\Message');
    }

    public function deleteHistoryOrmUser()
    {
    	return $this->hasOne('App\User');
    }
}
