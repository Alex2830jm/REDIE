<x-dashboard-layout>

    <div x-data="{
        showPassword: true,
        newPassword: '',
        confirmPassword: '',
        validate: false,
        validateMin: false,
        validateMax: false,
        validateCar: false,
        validateNum: false,
        validateLMA: false,
        validateLMN: false,
    
        validatePassword() {
            const caracteres = /[!#$%&,.-_]/;
            const numeros = /\d/;
            const minusculas = /[a-z]/;
            const mayusculas = /[A-Z]/;
            const max = 16;
            const min = 8;
    
    
            this.validateMin = this.newPassword.length >= min;
            this.validateMax = this.newPassword.length >= min && this.newPassword.length <= max;
            this.validateCar = caracteres.test(this.newPassword);
            this.validateNum = numeros.test(this.newPassword);
            this.validateLMA = mayusculas.test(this.newPassword);
            this.validateLMN = minusculas.test(this.newPassword);
    
            this.validate = this.validateMin && this.validateMax && this.validateCar &&
                this.validateNum && this.validateLMA && this.validateLMN;
        }
    }" class="px-4 py-6 mt-10 mb-8 bg-white rounded-lg shadow-md space-y-10">
        <div class="flex flex-col justify-center">
            <h1 class="text-5xl font-bold text-cherry-900 text-center"> Hola {{ Auth::user()->name }} </h1>
            <h1 class="text-2xl font-semibold text-gold-500 text-center">
                Antes de iniciar, es hora de cambiar tu contraseña para más seguridad
            </h1>

            <div class="-mx-4 -my-2 overflow-x-auto">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden divide-y divide-gray-200">
                        <form method="POST" action="{{ route('update-password', $user->id) }}" x-on:submit.prevent="if(validate) $el.submit()">
                            @csrf
                            <div class="relative mb-3">
                                <label for="username" class="block text-sm font-medium text-gray-700">Usuario: </label>
                                <input type="text" id="username" name="username" value="{{ $user->username }}"
                                    readonly
                                    class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:right-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">

                            </div>
                            <div class="relative mb-3">
                                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña Nueva:
                                </label>
                                <input :type="showPassword ? 'password' : 'text'" id="password" name="password"
                                    x-model="newPassword" @input='validatePassword'
                                    class="mt-1 p-2 w-full border rounded-md focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 transition-colors duration-300">
                                <div class="flex items-center absolute inset-y-0 right-0 mt-6 mr-3 text-sm leading-5">
                                    <svg @click="showPassword = !showPassword"
                                        :class="{ 'hidden': !showPassword, 'block': showPassword }"
                                        class="h-6 text-cherry-700" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    <svg @click="showPassword = !showPassword"
                                        :class="{ 'block': !showPassword, 'hidden': showPassword }"
                                        class="h-5 text-cherry-700" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </div>
                            </div>
                            <button type="submit"
                                :class="{'disabled: opacity-50': !validate}"
                                class="mt-3 w-full bg-black text-white p-2 rounded-md hover:bg-gray-800  focus:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300">
                                Cambiar Contraseña
                            </button>
                            <div class="mb-3">

                                <h4 class="my-2 text-sm font-semibold text-gray-800">
                                    Tu contaseña debe de contener lo siguiente:
                                </h4>

                                <ul class="space-y-1 text-sm text-gray-500">
                                    <li :class="{ 'text-teal-500': validateMin, }" class="flex items-center gap-x-2">
                                        <svg x-show="!validateMin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        <svg x-show="validateMin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        Número mínimo de caracteres: 8
                                    </li>

                                    <li :class="{ 'text-teal-500': validateMax, }" class="flex items-center gap-x-2">
                                        <svg x-show="!validateMax" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        <svg x-show="validateMax" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        Número máximo de caracteres: 16
                                    </li>

                                    <li :class="{ 'text-teal-500': validateLMN }" class="flex items-center gap-x-2">
                                        <svg x-show="!validateLMN" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        <svg x-show="validateLMN" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        Contener una letra minúscula
                                    </li>

                                    <li :class="{ 'text-teal-500': validateLMA, }" class="flex items-center gap-x-2">
                                        <svg x-show="!validateLMA" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        <svg x-show="validateLMA" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        Contener una letra mayúscula
                                    </li>

                                    <li :class="{ 'text-teal-500': validateNum }" class="flex items-center gap-x-2">
                                        <svg x-show="!validateNum" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        <svg x-show="validateNum" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        Contener un número
                                    </li>

                                    <li :class="{ 'text-teal-500': validateCar }" class="flex items-center gap-x-2">
                                        <svg x-show="!validateCar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                        <svg x-show="validateCar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="shrink-0 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        Contener algún caracter especial ( ! # $ % & , . - _ )
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
