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
        $data = Buysell :: all();
        return view('new',['data' => $data]);
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
        $data = Buysell::orderBy($x,$y)->get(); 
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

        //dd($path);
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
        return view('new',['data' => $data]);
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
