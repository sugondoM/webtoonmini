<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    public $table = "USER";
    
    protected $fillable = [
        'username',
        'avatar_url', 
        'email', 
        'password', 
        'type',
        'created_at',
        'updated_at',
        'deleted'
    ];
    
    protected $hidden = array('password','remember_token');
    
    

}
