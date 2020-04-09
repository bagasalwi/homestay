<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
