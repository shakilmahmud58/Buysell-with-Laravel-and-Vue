<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Buysell;

class Reviews extends Model
{
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function buysell()
    {
        return $this->belongsTo('App\Buysell');
    }
}
