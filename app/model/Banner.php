<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $table = "BANNER";
    
    protected $fillable = [
        'banner_name',
        'banner_links',
        'banner_url',
        'banner_page'
    ];
    
    protected $rules = array(
        "banner_name"   => "required|max:50",
        "banner_links"   => "required|max:600",
        "banner_url"    => "required|max:600",
        "banner_page"   => "required",
    );
    
    protected $messages = array (
        "banner_name.required"     => "Banner name must be filled",
        "banner_links.required"     => "Banner link must be filled",
        "banner_url.required"      => "Banner url must be filled",
        "banner_page.required"     => "Banner page must be filled",
    );
    
    public function getRules(){
        return $this->rules;
    }
    
    public function getMessages(){
        return $this->messages;
    }
}
