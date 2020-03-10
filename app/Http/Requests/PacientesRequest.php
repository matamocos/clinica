<?php

namespace App\Http\Requests;

use App\Paciente;
use App\Rules\Dni;
use App\Rules\Email;
use App\Rules\Telefono;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class PacientesRequest extends FormRequest
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
            'nombre' => 'required|max:20|min:2',
			'apellido_1' => 'required|max:20|min:2|alpha',
			'apellido_2' => 'required|max:20|min:2|alpha',
			'telefono' => ['required','max:9','min:9', new Telefono],
			'dni' => ['required','max:10','min:9','unique:pacientes', new Dni],
			'fecha_nacimiento' => 'required|date|after:1/1/1900|before:11/3/2020',
			'pais' => 'required|max:50|min:2',
			'ciudad' => 'required|max:50|min:2',
			'email' => ['max:60', new Email],
        ];
    }
}
