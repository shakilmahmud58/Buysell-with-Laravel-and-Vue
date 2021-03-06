<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buysell extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function reviews()
    {
        return $this->hasMany('App\Reviews');
    }
}
