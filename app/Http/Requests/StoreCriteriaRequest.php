<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCriteriaRequest extends FormRequest
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
        return json_encode($this->request);
        $parameter_id = $this->request->parameter_id;
        $level_id = $this->request->parameter_id;
        
        return [
            'bia_process_id' => ['required','numeric'],
            'parameter_id' => ['required','numeric'],
            'level_id' => ['required','numeric', Rule::unique('criterias')->where(function ($query) use ($parameter_id,$level_id){
                return $query->where('parameter_id',$parameter_id)->where('level_id',$level_id);
            })],
            'criterio' => ['required','string','max:1000']
        ];
    }
}
