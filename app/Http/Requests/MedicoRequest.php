<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Medico;
use App\Rules\Telefono;

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
			'telefono' => ['required','max:9','min:9', new Telefono],
			'fecha_nacimiento' => 'required|date|before:1/1/1995',
        ];
    }//end rules
	
	public function messages(){
		return [
			//
		];
	}
}
