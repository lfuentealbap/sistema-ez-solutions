<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajoRequest extends FormRequest
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
            'titulo' => ['required','max:255'],
            'descripcion' => ['required','max:1000'],
            'ciudad' => ['required','max:255'],
            'direccion' => ['required','max:255'],
            'fecha_inicio' => ['required'],
            'fecha_termino' => ['required'],
            'rut_trabajador' => ['required'],
            'pago' => ['required','min:0'],
            'id_area' => ['required'],
            'estado' => [],

        ];
    }
}
