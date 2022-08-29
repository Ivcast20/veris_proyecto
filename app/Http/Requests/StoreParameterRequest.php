<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreParameterRequest extends FormRequest
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
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('parameters')->where('bia_process_id',$this->bia_process_id)
            ],
            'estado' => 'required|boolean',
            'bia_process_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'bia_process_id.required' => 'Elija un proceso BIA',
            'nombre.unique' => 'Ya existe un parámetro con ese nombre para este proceso BIA'
        ];
    }
}
