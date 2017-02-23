<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Ratings;
use App\Client;
class NewRate  implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
  public $rate;
  public  $client;
    /**
     * Create a new event instance.
     *
     * @return void
     */
 public function __construct(Ratings $rate,Client $client)
    {
        $this->rate = $rate;
        $this->client = $client;

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
