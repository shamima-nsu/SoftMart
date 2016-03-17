<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software_category extends Model
{
    protected $table = 'software_categories';

   
    protected $fillable = ['category'];


    protected $guarded= [];

    public function categoryOrmPost()
    {
        return $this->belongsTo('App\Post');
    }

}
