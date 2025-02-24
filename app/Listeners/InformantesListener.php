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
            'Titular de la Dependencia',
            'Enlace Responsable de la entrega de la información'
        ] : [
            'Titular de la Unidad Generadora de Información'
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
