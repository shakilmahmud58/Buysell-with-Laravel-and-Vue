<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Messagelist;
use Notification;
use App\Notifications\ReceivedMessage;
use App\Events\MessageSent;

class MessageController extends Controller
{
    
    public function message(User $id)
    {
        $user = $id;
         return view('messenger',['user'=>$user]);
    }
    public function messageget(User $id)
    {
        
        $x = $id->id;
        $user = $id;
        $currentuser= auth()->user()->id;
        $getmessage = Message::where(function($query) use ($currentuser,$x){
                                     $query->where('from',$currentuser)
                                            ->where('to',$x);
                              })
                            ->orWhere(function($query) use($currentuser,$x){
                                 $query->where('to',$currentuser)
                                       ->where('from',$x);
                                       }) ->get();  
        return response()->json($getmessage);
    }
    public function getmessage()
    {
        $y=auth()->user()->id;
        return view('message',['user'=>$y]);
    }
    public function postmessage(Request $request,User $id)
    {
        
        $x = $id->id;
        $y =  auth()->user()->id;
       
        $value=$y;
        $z=Messagelist::where(function($query) use($x,$y){
            $query->where('userid',$y)->where('user_id',$x);
           })
            ->count();
       // Notification::send(User::find($x),new MessageSent($value)); 
        if($z==0)
        {
           Messagelist::create([
               'userid'=> $y,
               'user_id'=> $x
              ]);
           Messagelist::create([
              'userid'=> $x,
              'user_id'=> $y
              ]);
        }
        Messagelist::where('userid',$y)
                     ->where('user_id',$x)
                     ->update(['updated_at'=>now()]);
        Messagelist::where('userid',$x)
                     ->where('user_id',$y)
                     ->update(['updated_at'=>now()]);             
            
        $data = Message::create([
           'from' => auth()->user()->id,
           'to'   => $x,
           'text' => $request->text
       ]);
       Notification::send(User::find($x),new ReceivedMessage($data));
       event(new MessageSent($data));
       return $data;
    }
    public function example()
    {
        $y=auth()->user()->id;
        $allmsg = Messagelist::with('user')->where('userid',$y)->orderBy('updated_at','desc')->get();
        return response([
            'user' => $y,
            'message' =>$allmsg
        ]);
    }
   
}
