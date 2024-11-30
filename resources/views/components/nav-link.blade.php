@props(['active'])

@php
    $classes =
        $active ?? false
            //Ruta Activa
            ? 'my-2 transition-colors hover:text-gold-500 duration-300 transform hover:text-secondary md:mx-4 md:my-0'
            //Ruta Inactiva
            : 'my-2 transition-colors hover:text-gold-500 duration-300 transform hover:text-secondary md:mx-4 md:my-0';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>