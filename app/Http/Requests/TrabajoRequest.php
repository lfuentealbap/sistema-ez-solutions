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
            'fecha_inicio' => ['required'],
            'fecha_termino' => ['required'],
            'pago' => ['required','min:0'],

        ];
    }
}
