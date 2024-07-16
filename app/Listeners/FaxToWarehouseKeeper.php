<?php

namespace App\Listeners;

use App\Events\AwardSelected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FaxToWarehouseKeeper
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AwardSelected $event): void
    {
        //Send fax to warehouse keeper
    }
}
