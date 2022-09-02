<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
                Rule::unique('product_services')
                ->ignore($this->product_service->id)
                ->where('bia_process_id', $this->product_service->bia_process_id)
            ],
            'category_id' => [
                'required',
                'numeric'
            ],
            'estado' => [
                'required',
                'boolean'
            ]
        ];
    }
}
