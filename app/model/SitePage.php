<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class SitePage extends Model
{
    public $table = "SITEPAGE";
    
    protected $fillable = [
        'page_name',
    ];
    
}
