<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MyController extends Controller
{
    public function show()
    {
    
        return view('welcome');
    }
    public function admin()
    {
    
        return view('adminhome');
    }


 }
