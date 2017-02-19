<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class NewRate  implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
  public $rate;

    /**
     * Create a new event instance.
     *
     * @return void
     */
 public function __construct($rate)
    {
        $this->rate = $rate;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('newRate');
                return ['newRateChannel'];

    }
}
