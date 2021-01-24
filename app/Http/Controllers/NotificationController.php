<?php

namespace App\Http\Controllers;
use App\Notification;
use App\User;
use App\Messagelist;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;


class NotificationController extends Controller
{
    public function store()
    {
      $x = auth()->user()->id;
      //$y = 'data->data->from';
      // $data = Notification::groupBy('notifiable_id')->get();
      $msg = Notification::selectRaw('count(*) as msg')
        ->where('notifiable_id',$x)
        ->where('read_at',NULL)
        ->where('type','App\Notifications\ReceivedMessage')
       ->where('data->data->from','<>',$x)
       ->groupBy('data->data->from')
       ->get();
       $data= count($msg);
       return($data);
    }
    public function read(User $id)
    {
        $to = $id->id;
        $user =auth()->user()->id;
        $data = Notification::where('notifiable_id',$user)
                              ->where('data->data->from',$to)
                              ->where('type','App\Notifications\ReceivedMessage')
                              ->where('read_at',NULL)
                              ->update(['read_at'=>now()]);

        
    }
     public function getrevnoti()
     {
        $x = auth()->user()->unreadNotifications;
        return  $x;
     }
     public function countunread()
     {
        $user =auth()->user()->id;
        $num= Notification::where('type','App\Notifications\ReviewNotification')
                            ->where('notifiable_id',$user)
                            ->count();
        return $num;
     }
     public function readit(Request $request)
     {
         $id = $request->id;
         $data = Notification::where('id',$id)
                              ->delete();
     }

    //extra
    public function unreadmsg(User $id)
    {
        $userid = $id->id;
        $to = auth()->user()->id;
        $data = Notification::where('data->data->from',$userid)
                      ->where('data->data->to',$to)
                      ->where('read_at',NULL)
                      ->count();
        return $data;
    }
}
