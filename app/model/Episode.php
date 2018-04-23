<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $table = "EPISODE";
    
    protected $fillable = [
        'episode_number',
        'episode_title', 
        'series_id',
        'thumbnail_url'        
    ];
    
    protected $rules = array(
        "episode_number"  => "required|numeric",
        "episode_title"  => "required",
        "thumbnail_url"   => "required",
        "series_id"       => "required",
    );
    
    protected $messages = array (
        "episode_number.required"   => "Episode number must be filled",
        "episode_number.numeric"    => "Episode number must be numeric",
        "episode_title.required"    => "Episode title must be filled",
        "thumbnail_url.required"    => "Thumbnail image must be choosen",
        "series_id.required"        => "Series id must be filled",
    );
    
    public function getRules(){
        return $this->rules;
    }
    
    public function getMessages(){
        return $this->messages;
    }
    
    public function series()
    {
        return $this->belongsTo('App\model\Series');
    }
    
    public function page()
    {
        return $this->hasMany('App\model\Page');
    }
    
   
}
