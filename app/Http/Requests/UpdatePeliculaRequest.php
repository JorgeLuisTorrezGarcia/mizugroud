<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeliculaRequest extends FormRequest
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
            'titulo'=>'string|required|unique:peliculas,titulo,'.$this->route('pelicula')->id.'|max:50',
            'idioma'=>'string|required',

            'precio'=>'required|',  
        ];
    }
    public function messages()
    {
        return[
            'titulo.required'=>'Este campo es requerido.',
            'titulo.string'=>'El valor no es correcto.',
            'titulo.max'=>'Solo permite 50 caracteres.',

            'idioma.required'=>'Este campo es requerido.',
            'idioma.string'=>'El valor no es correcto.',

            'precio.required'=>'Este campo es requerido.',
            
        ];
    }
}
