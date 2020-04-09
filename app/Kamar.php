<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $guarded = [];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function jeniskamar()
    {
        return $this->belongsTo(Jeniskamar::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
