<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reviews;
use App\Buysell;
use Notification;
use App\Notifications\ReviewNotification;
use DB;
use App\Events\SendMessage;
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
    $x = Reviews::with('buysell')->select('*')
             ->where('buysell_id',$productid)
             ->first();
    $currentuser = auth()->user()->id;
    $user = $x->buysell->user;
    $pname = $x->buysell->name;
    event(new SendMessage($data));
    if($currentuser!=$user->id)
    Notification::send($user,new ReviewNotification(['user'=>auth()->user()->username,
                                                     'data'=>$data,
                                                      'pname'=>$pname
                                                      ]
                                                   )
                           );
   }
   public function getreviews(Buysell $id)
   {
    $pid = $id->id;
    $reviews = Reviews::where('buysell_id',$pid)->orderBy('created_at','DESC')->get();
    return $reviews;
   }
   public function shownoti()
   {
      $noti = auth()->user()->id;
      return view('shownoti',['user'=>$noti ]);
   }
   
}
