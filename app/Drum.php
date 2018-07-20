<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drum extends Model
{
    public function drum() { 
        return $this->belongsTo('App\User'); 
    } 
}
