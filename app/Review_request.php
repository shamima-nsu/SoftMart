<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review_request extends Model
{
    protected $table = 'review_requests';

   
    protected $fillable = ['senderId', 'receiverId'];

    protected $guarded= [];
}
