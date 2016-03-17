<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillsAndPost extends Model
{
    protected $table = 'skillsandposts';

   
    protected $fillable = ['skillId', 'postId'];

    protected $guarded= [];

}
