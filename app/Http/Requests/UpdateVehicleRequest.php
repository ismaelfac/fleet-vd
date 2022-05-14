<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
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
            
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Requiere de una descripcion',
            'year.required' => 'Requiere del anio del vehiculo',
            'make.required' => 'Requiere de un make',
            'capacity.required' => 'Requiere de un capacity'

        ];
    }
}
