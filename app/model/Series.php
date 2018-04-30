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
        'recommend',
        'recommend_order',
        'user_id',
        'deleted',
    ];
    
    protected $rules = array(
        "series_title"  => "required|max:50",
        "author"        => "required|max:50",
        "genre"         => "required",
        "thumbnail_url" => "required|max:600",
        "banner_url"    => "required|max:600",
        "recommend_order" => "nullable|numeric",
        "summary"       => "required|max:600",
    );
    
    protected $messages = array (
        "series_title.required"     => "Series title must be filled",
        "author.required"           => "Author name must be filled",
        "genre.required"            => "Genre name must be choosen",
        "thumbnail_url.required"    => "Thumbnail image must be choosen",
        "recommend_order"           => "Recommend order can only be number",
        "banner_url.required"       => "Banner image must be choosen",
        "summary.required"          => "Summary must be filled",
        "summary.max"               => "Maximum character is 600",
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
