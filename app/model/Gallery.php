<?php
namespace app\model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $table = "GALLERY";
    
    protected $fillable = [
        'item_name',
        'item_url',
        'item_type',
        'price',
        'illustrator',
        'series_name'
    ];
    
    protected $rules = array(
        "item_name"     => "required",
        "item_url"      => "required",
        "item_type"     => "required",
        "price"         => "numeric",
    );
    
    protected $messages = array (
        "item_name.required"   => "Item name must be filled",
        "item_url.required"    => "Item url must be filled",
        "item_type.required"   => "Item type must be filled",
        "price.numeric"        => "Price format only number"
    );
    
    public function getRules(){
        return $this->rules;
    }
    
    public function getMessages(){
        return $this->messages;
    }
    
}

