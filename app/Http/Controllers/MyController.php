<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fooditem;
use App\Butic;
class MyController extends Controller
{
    public function show()
    {
    
        return view('welcome');
    }
    public function showfoodies()
    {
        $data = Fooditem::where('available','1')->get();
        $butics = Butic::where('available','1')->get();
        //dd($butics);
        return view('foodies',['fooditem'=>$data,'butics'=> $butics ]);
    }
    public function getit()
    {
        $data = Fooditem::all();
        return $data;
    }
    public function getselected()
    {
        $data = Fooditem::where('available','1')->pluck('name');
        return $data;
    }
    public function updateit(Request $request)
    {
        $id = $request->data;
        $x=Fooditem::where('id',$id)->get();
        $value = $x[0]->available;
        if($value==0){
            Fooditem::where('id',$id)->update(['available'=> 1]);
            return '1';
        }
        if($value==1){
            Fooditem::where('id',$id)->update(['available'=> 0]);
            return '0';
        }
    }
    public function admin()
    {
    
        return view('adminhome');
    }


    public function adminpost(Request $request)
    {
        $data = $request->itemname;
        $x= 0;
        return Fooditem::create([
            'name'=>$data,
            'available'=> $x
        ]);
    }

 }
