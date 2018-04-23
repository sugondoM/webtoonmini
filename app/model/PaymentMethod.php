<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    public $table = "PAYMENT_METHOD";
    
    protected $fillable = [
        'payment_name',
        'description',
    ];
    
    protected $rules = array(
        "payment_name"  => "required",
        "description"   => "required",
    );
    
    protected $messages = array (
        "payment_name.required"     => "Payment method name must be filled",
        "description.required"      => "Description must be filled",
    );
    
    public function getRules(){
        return $this->rules;
    }
    
    public function getMessages(){
        return $this->messages;
    }
}
