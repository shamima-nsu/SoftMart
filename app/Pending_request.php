<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pending_request extends Model
{
   	protected $table = 'pending_requests';

   
    protected $fillable = ['userId', 'userRoleId', 'postId', 'category', 'skill'];

    protected $guarded= [];
}
