<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function kamar()
    {
        return $this->hasMany(Kamar::class);
    }
}
