<a 
    {{ $attributes->merge(['class' => 'flex items-center p-3 bg-brown-300 text-sm text-cherry-800 font-semibold cursor-default capitalize transition-colors duration-300 transform hover:bg-cherry-800 hover:text-brown-300']) }} 
>
    {{ $slot }}
</a>
