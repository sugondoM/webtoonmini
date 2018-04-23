<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "CATEGORY";
    
    protected $fillable = [
        'category_name',
    ];
 
}
