<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    //Validaciones para un nuevo usuario
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required','string',Password::min(8)->mixedCase()->numbers()->symbols()],
            'roles' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'roles.required' => 'Elija al menos un rol',
            'email.unique' => 'El correo electrónico ya está en uso',
        ];
    }
}
