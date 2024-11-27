<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'primerApellido' => ['required', 'string', 'max:255'],
            'segundoApellido' => ['string', 'max:255'],
            'username' => ['required', 'string', 'lowercase', 'unique:users,username'],
            'passwod' => ['required', 'string'],
        ];
    }
}
