<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Notification;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $y=auth()->user()->id;
        $x=User::find($y);
        //$z = Notification::all();
        //dd($z);
        return view('home',['x'=>$x]);
    }
    public function notifications()
    {
        
    }
}
