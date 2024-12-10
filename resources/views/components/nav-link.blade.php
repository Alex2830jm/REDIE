@props(['active'])

@php
    $classes =
        $active ?? false
            //Ruta Activa
            ? 'flex items-center text-brown-300  gap-2 p-2 my-2 transition-colors duration-300 transform rounded-md hover:text-white md:mx-4 md:my-0'
            //Ruta Inactiva
            : 'flex items-center text-white gap-2 p-2 my-2 transition-colors duration-300 transform rounded-md hover:text-brown-300 md:mx-4 md:my-0';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>