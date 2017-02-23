<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Order;
use App\Client;

class NewOrder  implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;


  public $order;
  public $client;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order,Client $client)
    {
                $this->order = $order;
                 $this->client = $client;

        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
                return ('newOrderChannel');

        // return new PrivateChannel('channel-name');
    }

//     public function broadcastWith()
// {
//     return [
//         'user' => [
//             'name' => 'Klark Cent',
//             'age' => 30,
//             'planet' => 'Crypton',
//             'abilities' => 'Bashing'
//         ]
//     ];
// }
}
