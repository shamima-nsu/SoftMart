<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    
    protected $table = 'users';

   
    protected $fillable = ['name', 'email', 'password', 'userRoleId', 'confirmCode', 'companyId', 'Company_approve_code', 'prof_pic', 'verified', 'approved', 'completed'];

    
    protected $hidden = ['password', 'remember_token'];

    protected $guarded= [];


    public function userOrmPost()
    {
        return $this->hasMany('App\Post');
    }

    public function userOrmUserrole()
    {
        return $this->hasOne('App\User_role');
    }

    public function userOrmCompany()
    {
        return $this->hasOne('App\Company_detail');
    }

    public function userOrmComment()
    {
        return $this->hasMany('App\Comment');
    }

    public function userOrmQuotation()
    {
        return $this->hasMany('App\Quotation');
    }

    public function userOrmLike()
    {
        return $this->hasMany('App\Like');
    }

    public function userOrmDeleteHistory()
    {
        return $this->hasMany('App\Delete_history');
    }

    public function userReceiverOrmReview()
    {
        return $this->hasMany('App\Review');
    }

    public function userGiverOrmReview()
    {
        return $this->hasMany('App\Review');
    }

    public function userReceiverOrmRating()
    {
        return $this->hasMany('App\Rating');
    }

    public function userGiverOrmRating()
    {
        return $this->hasMany('App\Rating');
    }

    public function userReceiverOrmMessage()
    {
        return $this->hasMany('App\Message');
    }


    public function userSenderOrmMessage()
    {
        return $this->hasMany('App\Message');
    }

    public function userReceiverOrmNotification()
    {
        return $this->hasMany('App\Notification');
    }



}
