<?php

namespace App\Events;
use App\Reviews;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $review;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Reviews $data)
    {
        $this->review = $data;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('product'.$this->review->buysell_id);
    }
    public function broadcastWith()
    {
      return [
          'data'=> $this->review,
        //   'user'=> $this->review->user,
        //   'buysell'=>$this->review->buysell,
      ];
    }
}
