<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buysell;
use App\Reviews;

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
    public function search(Request $request)
    {
       $data= $request->name;
       $names= Buysell::where('name','LIKE',"%{$data}%")->pluck('name');
       return $names;
    }
    public function details(Buysell $id)
    {
        $data=$id;
        $user = auth()->user();
        //$data = Buysell::where("id",$id)->get();
        return view('productdetails',["data"=> $data,"user"=>$user]);
    }

 }
