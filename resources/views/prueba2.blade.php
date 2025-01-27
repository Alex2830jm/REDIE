<div class="mb-5 p-5 rounded-lg border-2 border-cherry-800">
    <div class="font-bold text-lg text-gray-700"></div>

    <input type="hidden" name="index[]" value="">

    <div class="mt-2">
        <label class="block uppercase tracking-wide text-sm font-semibold">Nombre Completo del Titular:</label>
        <input type="text" name="nombrePersona[]" class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100">
    </div>
    <div class="mt-2">
        <label class="block uppercase tracking-wide text-sm font-semibold">Profesion del Titular:</label>
        <input type="text" name="profesionPersona[]"
            class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100">
    </div>

    <div class="mt-2 grid md:grid-cols-2">
        <div>
            <label class="block uppercase tracking-wide text-sm font-semibold">Área Informante:</label>
            <input type="text" name="areaInformantePersona[]"
                class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100" value="" readonly>
        </div>
        <div>
            <label class="block uppercase tracking-wide text-sm font-semibold">Cargo en el Área:</label>
            <input type="text" name="cargoAreaPersona[]"
                class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100" value="">
        </div>
    </div>

    <div class="mt-2 grid md:grid-cols-2">
        <div>
            <label class="block uppercase tracking-wide text-sm font-semibold">Número Telefónico de Contacto:</label>
            <input type="text" name="telefonoContactoPersona[]"
                class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100">
        </div>
        <div>
            <label class="block uppercase tracking-wide text-sm font-semibold">Correo Electrónico de Contacto:</label>
            <input type="text" name="correoContactoPersona[]"
                class="w-full border rounded-lg border-gray-400 p-3 bg-gray-100">
        </div>
    </div>
</div>
