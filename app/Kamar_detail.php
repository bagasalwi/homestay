<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar_detail extends Model
{
    protected $guarded = [];
    
    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }
}
