<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHorarioRequest extends FormRequest
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


    public function rules()
    {
        return [
            'hr_inicio'=>'required|string',
            'hr_fin'=>'required|string',
        ];
    }
    public function messages()
    {
        return[
            'hr_inicio.required'=>'Este campo es requerido.',
            'hr_inicio.string'=>'El valor no es correcto.',
            
            'hr_fin.required'=>'Este campo es requerido.',
            'hr_fin.string'=>'El valor no es correcto.',
            
        ];
    }
}
