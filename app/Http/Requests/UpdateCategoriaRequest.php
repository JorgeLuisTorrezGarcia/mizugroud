<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
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
            'nombre'=>'required|string|max:50',
            'descripcion'=>'nullable|string|max:250',
            
        ];
    }
    public function messages()
    {
        return[
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.max'=>'Solo permite 50 caracteres.',
            
            'descripcion.string'=>'El valor no es correcto.',
            'descripcion.max'=>'Solo permite 250 caracteres.',
            
        ];
    }
}