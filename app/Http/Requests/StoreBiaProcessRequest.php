<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBiaProcessRequest extends FormRequest
{
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
            'nombre' => 'required|string|max:255|unique:bia_processes',
            'alcance' => 'required|string|max:600',
            'fecha_inicio' => 'required|date|after:yesterday',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ];
    }

    public function messages()
    {
        return [
            'fecha_inicio.after' => 'La fecha de inicio debe ser igual o posterior al día de hoy'
        ];
    }
}
