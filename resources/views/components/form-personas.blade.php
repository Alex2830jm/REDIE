@props(['tipoForm', 'area', 'nombreDependencia', 'telefonoAtencion'])

{{ $tipoForm }}

<div class='mb-5 p-5 rounded-lg border-2 border-cherry-800'>
    <div class='font-bold text-lg text-gray-700'> {{ $area }} - {{ $nombreDependencia }} </div>
    <input type='hidden' name='' value='  index  '>
    <div class='mt-2'>
        <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Nombre Completo del
            Titular</label>
        <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
        name="nombrePersona_{{$tipoForm}}[]">

    </div>
    <div class='mt-2'>
        <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Profesión del
            Titular</label>
        <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
            name='profesionPersona_{{$tipoForm}}[]' placeholder='Ingenier@ en ...'>
    </div>
    <div class='mt-2 grid grid-cols-2 gap-4'>
        <div>
            <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Área Informante</label>
            <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='areaPersona_{{$tipoForm}}[]'
                value='{{ $area }}' readonly>
        </div>
        <div>
            <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Cargo en el área</label>
            <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
                name='cargoPersona_{{$tipoForm}}[]' placeholder='Jefe del área...'>
        </div>
    </div>
    <div class='mt-2 grid grid-cols-2 gap-4'>
        <div>
            <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Telefono de Contacto del
                Titular </label>
            <div class="flex">
                <span
                    class="inline-flex items-center px-3 text-gray-600 text-semibold text-xs bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                     {{ $telefonoAtencion }} ext.
                </span>
                <input type="text" id="telefonoPersona" name="telefonoPersona_{{$tipoForm}}[]"
                    class="rounded-none rounded-e-lg bg-gray-100 border p-3 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300" />
            </div>
        </div>
        <div>
            <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Correo Electronico de
                Contacto</label>
            <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='email'
                name='correoPersona_{{$tipoForm}}[]' placeholder='example@mail.com'>
        </div>
    </div>
</div>
