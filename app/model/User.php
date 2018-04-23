<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    public $table = "USER";
    
    protected $fillable = [
        'username',
        'nickname',
        'password',
        'avatar_url',
        'about', 
        'email',
        'facebook_url',
        'twitter_url',
        'ig_url',
        'google_url',
        'deleted'
    ];
    
    protected $hidden = array('password','remember_token');
    
    
    protected $rules = array(
        "username"      => "required",
        "password"      => "required",
        "avatar_url"    => "required",
        "email"         => "required|email",
        "deleted"       => "required"
    );
    
    protected $rules2 = array(
        "username"      => "required",
        'password'      => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6',
        "avatar_url"    => "required",
        "email"         => "required|email",
        "deleted"       => "required"
    );
    
    protected $messages = array (
        "username.required"     => "Usename must be filled",
        "password.required"     => "Password must be filled",
        "email.required"        => "Email must be filled",
        "email.email"           => "Email format is not match",
        "deleted.required"      => "Deleted must be choosen",
        "password.min"     => "Password minimum is six character",
        "password.same"     => "Password and confirm is not the same",
        "password.required_with"    => "Password confirmation must be filled",
        "password_confirmation.min" => "Password confirmation minimum is six character"
    );
    
    Public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] =  Hash::make($password);
    }
    
    public function getRules(){
        return $this->rules;
    }
    
    public function getRules2(){
        return $this->rules2;
    }
    
    public function getMessages(){
        return $this->messages;
    }
    

}
