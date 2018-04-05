<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = [
        'series_title', 
        'author',
        'thumbnail_url',
        'summary',
        'level',
        'user_id'
    ];
    
    public $table = "SERIES";
    
    public function episode()
    {
        return $this->hasMany('App\model\Episode');
    }
}
