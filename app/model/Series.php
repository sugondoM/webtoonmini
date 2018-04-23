<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $fillable = [
        'series_title', 
        'author',
        'thumbnail_url',
        'banner_url',
        'genre',
        'summary',
        'user_id',
        'deleted',
    ];
    
    protected $rules = array(
        "series_title"  => "required",
        "author"        => "required",
        "genre"         => "required",
        "thumbnail_url" => "required",
        "banner_url"    => "required",
        "summary"       => "required",
    );
    
    protected $messages = array (
        "series_title.required"     => "Series title must be filled",
        "author.required"           => "Author name must be filled",
        "genre.required"            => "Genre name must be choosen",
        "thumbnail_url.required"    => "Thumbnail image must be choosen",
        "banner_url.required"       => "Banner image must be choosen",
        "summary.required"          => "Summary must be filled",
    );
    
    public function getRules(){
        return $this->rules;
    }
    
    public function getMessages(){
        return $this->messages;
    }
    
    
    public $table = "SERIES";
    
    public function episode()
    {
        return $this->hasMany('App\model\Episode');
    }
    
    public function category()
    {
        return $this->hasOne('App\model\Category');
    }
}
