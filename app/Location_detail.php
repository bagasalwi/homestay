<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location_detail extends Model
{
    protected $guarded = [];
    
    public function location(){
        return $this->belongsTo(Location::class);
    }
}
