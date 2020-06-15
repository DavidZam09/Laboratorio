<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoVehiculoFormRequest extends FormRequest
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
            'id_tipo'=>'required|max:10',
            'nombre'=>'required|in:Automovil,Motocicleta,Otro|max:25',
            'descripcion'=>'max:25',
        ];
    }
}
