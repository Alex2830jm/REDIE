<?php

namespace App\Listeners;

use App\Events\DirectorioRegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UnidadesRegisterEvent
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
    public function handle(DirectorioRegisterEvent $event): void
    {
        $dependencia = $event->dependencia;

        
    }
}
