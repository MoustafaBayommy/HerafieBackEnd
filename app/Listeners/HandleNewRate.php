<?php

namespace App\Listeners;

use App\Events\NewRate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HandleNewRate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewRate  $event
     * @return void
     */
    public function handle(NewRate $event)
    {
        //
    }
}
