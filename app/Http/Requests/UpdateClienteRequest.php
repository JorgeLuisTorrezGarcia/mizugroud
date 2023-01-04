<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
            'nombre'=>'required|string|max:90',
            'ci'=>'unique:clientes,ci,'.$this->route('cliente')->id.'|required|string|max:8',
            'telefono'=>'unique:clientes,telefono,'.$this->route('cliente')->id.'|required|string|max:8',
            'email'=>'unique:clientes,email,'.$this->route('cliente')->id.'|required|string|max:255|email:rfc,dns',
        ];
    }
    public function messages()
    {
        return[
            'nombre.required'=>'Este campo es requerido.',
            'nombre.string'=>'El valor no es correcto.',
            'nombre.max'=>'Solo permite 90 caracteres.',
            
            'ci.required'=>'Este campo es requerido.',
            'ci.string'=>'El valor no es correcto.',
            'ci.max'=>'Solo permite 8 caracteres.',
            'ci.min'=>'Se requiere 8 caracteres.',
            'ci.unique'=>'El usuario ya esta registrado.',

            'telefono.required'=>'Este campo es requerido.',
            'telefono.string'=>'El valor no es correcto.',
            'telefono.max'=>'Solo permite 8 caracteres.',
            'telefono.min'=>'Se requiere 8 caracteres.',
            'telefono.unique'=>'El telefono esta usado.',

            'email.required'=>'Este campo es requerido.',
            'email.string'=>'El valor no es correcto.',
            'email.max'=>'Solo permite 255 caracteres.',
            'email.unique'=>'El correo electronico ya esta registrado.',
            'email.email'=>'No es un correo electronico.',

        ];
    }
}