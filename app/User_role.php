<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    protected $table="user_roles";
    protected $fillable= ['role'];

    protected $guarded= [];

    public function userRoleOrmUser()
    {
    	return $this->belongsTo('App\User');
    }


}
