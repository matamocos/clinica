<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteEditarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:20|min:2',
			'apellido_1' => 'required|max:20|min:2|alpha',
			'apellido_2' => 'required|max:20|min:2|alpha',
			'telefono' => ['required','max:9','min:9', new Telefono],
			'dni' => ['required','max:10','min:9', new Dni],
			'fecha_nacimiento' => 'required|date|after:1/1/1900|before:4/3/2020',
			'pais' => 'required|max:50|min:2',
			'ciudad' => 'required|max:50|min:2',
			'email' => ['max:60', new Email],
        ];
    }
}
