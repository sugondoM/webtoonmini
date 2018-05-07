<?php

namespace App\model;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    public $table = "ADS";
    
    protected $fillable = [
        'ads_name',
        'ads_page',
        'ads_links',
        'ads_portrait_url',
        'ads_landscape_url',
        'ads_active'
    ];
    
    protected $rules = array(
        "ads_name"          => "required|max:50",
        "ads_page"          => "required",
        "ads_links"          => "required|max:600",
        "ads_portrait_url"  => "required|max:600",
        "ads_landscape_url"  => "required|max:600",
        "ads_active"        => "required"
    );
    
    protected $messages = array (
        "ads_name.required"             => "Advertising name must be filled",
        "ads_page.required"             => "Advertising page must be filled",
        "ads_links.required"             => "Advertising link must be filled",
        "ads_portrait_url.required"     => "Advertising portrait image must be selected",
        "ads_landscape_url.required"    => "Advertising landscape image must be selected",
        "ads_active"                    => "Advertising status need to be selected"
    );
    
    public function getRules(){
        return $this->rules;
    }
    
    public function getMessages(){
        return $this->messages;
    }
}
