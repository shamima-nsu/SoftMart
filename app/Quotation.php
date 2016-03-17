<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $table = 'quotations';

   
    protected $fillable = ['postId', 'vendorId', 'content', 'filename', 'price'];

    protected $guarded= [];

    public function quotationOrmPost()
    {
        return $this->belongsTo('App\Post');
    }

    public function quotationOrmUser()
    {
    	return $this->belongsTo('App\User');
    }

}
