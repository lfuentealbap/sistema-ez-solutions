<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OTRequest extends FormRequest
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
            //
            'rut_trabajador' => ['required'],
            'fecha' => ['required'],
            'nombre_colaborador' => ['required','max:255'],
            'direccion' => ['required'],
            'ciudad' => ['required'],
            'tipo_requerimiento' => ['required'],
            'detalles_equipo_antiguo' => ['max:1000'],
            'detalles_equipo_nuevo' => ['max:1000'],
            'descripcion_solucion' => ['required', 'max:1000'],
            'id_area' => ['required'],
            'id_trabajo' => ['required'],
            'observaciones' => ['max:1000'],
            'firma' => ['required'],
        ];
    }
}
