<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $nombre = $this->request->get('id');
        return [
            'nombre' => ['required','string','max:255', 'unique:categories,nombre,' . $nombre],
            'estado' => ['required','boolean']
        ];
    }
}
