<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Medico;

class MedicoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:20|min:2|alpha',
			'apellido_1' => 'required|max:20|min:2|alpha',
			'apellido_2' => 'required|max:20|min:2|alpha',
        ];
    }//end rules
	
	public function messages(){
		return [
			'nombre.required' => 'Prueba',
		];
	}
}
