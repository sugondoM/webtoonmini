<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $table = "PAGE";
    
    protected $fillable = [
        'page_number', 
        'file_url',
        'chapter_id'
    ];
}
