<?php

namespace App\Events;
use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

   public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $data)
    {
        $this->message = $data;
    }
    //
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('message_'.$this->message->to);
    }
    public function broadcastWith()
    {
        return [
            'data' => $this->message,
        ];
    }
}
//192.168.0.103
// listen(){
//     Echo.channel('product'+this.productid)
//      .listen('SendMessage',(data)=>{
//          this.reviews.unshift(data);
//      })
//  },