<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_detail extends Model
{
    protected $table="company_details";
    protected $fillable= ['name', 'logo', 'address', 'country', 'contactNo', 'websiteUrl', 'email'];


    protected $guarded= [];

    public function companyOrmUser()
    {
    	return $this->belongsTo('App\User');
    }

}
