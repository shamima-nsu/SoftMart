<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $table = 'pics';

   
    protected $fillable = ['location'];

    protected $guarded= [];

}
