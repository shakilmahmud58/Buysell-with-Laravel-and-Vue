<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buysell;
use App\User;
use App\Reviews;
use DB;
class BuysellController extends Controller
{
    public function index(Request $request)
    {

        $user = auth()->user();
        return view('new',['user'=>$user]);
    }
    public function index3(Request $request)
    {
        $data = Buysell ::with('user')->get();
       // $X=$data->user;
        return $data;
    }
    public function index2(Request $request)
    {
        $x = $request->type;
        $y = $request->order;
        $data = Buysell::with('user')->orderBy($x,$y)->get(); 
        return $data;
    }
    public function controlpanel()
    {
        return view('control');
    }
    public function forpost()
    {
        $path = 'storage/'.request('image')->store('buysells','public');
        $name = request('name');
        $color = request('color');
        $description = request('description');
        $price = request('price');
        $rating = request('rating');
        $currentuser= auth()->user()->id;
        $user = auth()->user();
        //dd(request('image'));
        Buysell :: create([
            'name' => $name,
            'color' => $color,
            'description' => $description,
            'price' => $price,
            'rating' => $rating,
            'image' => $path,
            'user_id' => $currentuser
            ]);
        $data = Buysell :: all();
        return view('new',['data' => $data,'user'=>$user]);
    }
    public function update(Request $request)
    {
        $name = $request->name;
        $color = $request->color;
        $des = $request->des;
        $price = $request->price;
        $id = $request->pid;
     if($request->image!='null'){
        $path = 'storage/'.$request->image->store('buysells','public');
        $data = Buysell::where('id',$id)->update([
            'name' => $name,
            'color' => $color,
            'description' => $des,
            'price' =>$price,
            'image' => $path
        ]);
     }
     else{
        $data = Buysell::where('id',$id)->update([
            'name' => $name,
            'color' => $color,
            'description' => $des,
            'price' =>$price,
        ]);       
     }
    }
    public function delete(Request $request)
    {
       $id = $request->id;
       Buysell::find($id)->delete();
    }
    public function recommendation()
    {
        //$data = Buysell ::orderBy('rating','desc')->take(5)->get();
        $data = Reviews::with('buysell')->select("buysell_id", DB::raw("count(*) as num"))
        ->groupBy('buysell_id')
        ->orderBy('num','desc')
        ->get();


        return $data;
    }
}
