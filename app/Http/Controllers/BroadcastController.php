<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function getit()
    {
        $x='hello';
       //event(new SendMessage($x));
       return view('broad');
    }
}
