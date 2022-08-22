<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLevelRequest extends FormRequest
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
                Rule::unique('levels')->where('bia_process_id', $this->bia_process_id)
            ],
            'valor' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('levels')->where('bia_process_id', $this->bia_process_id)
            ],
            'bia_process_id' => 'required|integer',
        ];
    }

}
