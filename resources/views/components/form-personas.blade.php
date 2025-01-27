@props([
    'index',
    'nivelInformante',
    'area_id'
])

<div class='mb-5 p-5 rounded-lg border-2 border-cherry-800'>
    <div class='font-bold text-lg text-gray-700'> area </div>
    <input type='hidden' name='index[]' value='  index  '>
    <div class='mt-2'>
        <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Nombre Completo del
            Titular</label>
        <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
            name='nombrePersonaDependencia[]'>
    </div>
    <div class='mt-2'>
        <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Profesión del
            Titular</label>
        <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
            name='profesionDependencia[]' placeholder='Ingenier@ en ...'>
    </div>
    <div class='mt-2 grid grid-cols-2 gap-4'>
        <div>
            <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Área Informante</label>
            <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text' name='areaUnidad[]'
                value='  area  ' readonly>
        </div>
        <div>
            <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Cargo en el área</label>
            <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
                name='cargoAreaDependencia[]' placeholder='Jefe del área...'>
        </div>
    </div>
    <div class='mt-2 grid grid-cols-2 gap-4'>
        <div>
            <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Número de Telefono de
                Contacto</label>
            <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='text'
                name='telefonoDependencia[]' placeholder='123 456 ext. 78'>
        </div>
        <div>
            <label class='block uppercase tracking-wide text-charcoal-darker text-xs font-bold'>Correo Electronico de
                Contacto</label>
            <input class='w-full border rounded-lg border-gray-400 p-3 bg-gray-100' type='email'
                name='correoDependencia[]' placeholder='example@mail.com'>
        </div>
    </div>
</div>