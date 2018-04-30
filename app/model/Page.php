<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $table = "PAGE";
    
    protected $fillable = [
        'page_number', 
        'file_url',
        'episode_id'
    ];
    
    protected $rules = array(
        "page_number"  => "required|numeric",
        "file_url"     => "required|max:600",
        "episode_id"   => "required",
    );
    
    protected $messages = array (
        "page_number.required"   => "Page number must be filled",
        "page_number.numeric"    => "Page number must be numeric",
        "file_url.required"      => "File url must be filled",
        "episode_id.required"    => "Episode id must be filled",
    );
    
    public function getRules(){
        return $this->rules;
    }
    
    public function getMessages(){
        return $this->messages;
    }
    
    public function episode()
    {
        return $this->belongsTo('App\model\Episode');
    }
}
