<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    public $table = "BANNER";
    
    protected $fillable = [
        'ads_name',
        'ads_link',
        'ads_portrait_url',
        'ads_landscape_url',
    ];
    
    protected $rules = array(
        "ads_name"          => "required",
        "ads_link"          => "required",
        "ads_portrait_url"  => "required",
        "ads_lanscape_url"  => "required",
    );
    
    protected $messages = array (
        "ads_name.required"             => "Advertising name must be filled",
        "ads_link.required"             => "Advertising link must be filled",
        "ads_portrait_url.required"     => "Advertising portrait image must be filled",
        "ads_landscape_url.required"    => "Advertising landscape image must be filled",
    );
    
    public function getRules(){
        return $this->rules;
    }
    
    public function getMessages(){
        return $this->messages;
    }
}
