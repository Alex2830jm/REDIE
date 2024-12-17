

@foreach ($Temas as $tema)
    <li>
        {{ $tema->principal->principal}}
    </li>
@endforeach