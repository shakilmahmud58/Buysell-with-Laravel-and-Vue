<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buysell;
class BuysellController extends Controller
{
    public function index()
    {
        $data = Buysell :: all();
        return view('new',['data' => $data]);
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
}
