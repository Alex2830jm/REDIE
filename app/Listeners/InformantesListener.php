<?php

namespace App\Listeners;

use App\Events\DirectorioRegisterEvent;
use App\Models\PersonaUnidad;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class InformantesListener
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

        $areas = $dependencia->nivelDI === '1' ? [
            '1', //Titular de la dependencia
            '2' //Enlace de Información
        ] : [
            '3' //Titular de la unidad
        ];

        foreach($areas as $area) {
            PersonaUnidad::create([
                "di_id"             => $dependencia->id,
                "nombrePersona"     => '',
                "profesionPersona"  => '',
                "areaPersona"       => $area,
                "cargoPersona"      => '',
                "telefonoPersona"   => '',
                "correoPersona"     => '',
            ]);
        }
    }
}
