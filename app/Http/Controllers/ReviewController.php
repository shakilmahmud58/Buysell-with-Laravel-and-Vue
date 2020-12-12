<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reviews;
use App\Buysell;

class ReviewController extends Controller
{
   public function store(Request $request)
   {
      $rewiew= $request->review;
      $productid= $request->productid;
      $data = Reviews::create([
        'user_id' => auth()->user()->id,
        'useremail' => auth()->user()->email,
        'buysell_id'=> $productid,
        'reviews' => $rewiew
    ]);
    return $data;
   }
   public function getreviews(Buysell $id)
   {
    $pid = $id->id;
    $reviews = Reviews::where('buysell_id',$pid)->orderBy('created_at','DESC')->get();
    return $reviews;
   }
}
