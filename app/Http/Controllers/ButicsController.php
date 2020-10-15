<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Butic;
class ButicsController extends Controller
{
    public function getit()
    {
        $data =Butic::all();
        return $data;
    }
    public function getselected()
    {
        $data = Butic::where('available','1')->pluck('name');
        return $data;
    }
    public function updateit(Request $request)
    {
        $id = $request->data;
        $x=Butic::where('id',$id)->get();
        $value = $x[0]->available;
        if($value==0){
            Butic::where('id',$id)->update(['available'=> 1]);
            return '1';
        }
        if($value==1){
            Butic::where('id',$id)->update(['available'=> 0]);
            return '0';
        }
    }

    public function adminpost(Request $request)
    { 
        $path ='storage/'.$request->file('image')->store('uploads','public');
        $name = $request->itemname;
        $price = $request->price;
        return Butic::create([
            'name'=>$name,
            'price'=>$price,
            'image'=>$path,
            'available'=>0
        ]);

    }
}
