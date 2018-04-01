<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $table = "EPISODE";
    
    protected $fillable = [
        'episode_title', 
        'series_id',
    ];
}
