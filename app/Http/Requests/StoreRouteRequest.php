<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRouteRequest extends FormRequest
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
            'driver_id' => 'required|integer|exists:drivers,id',
            'vehicle_id' => 'required|integer|exists:vehicles,id',
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'driver_id.required' => 'Requiere de un nombre',
            'vehicle_id.required' => 'Requiere de un apellido',
            'description.required' => 'Requiere de un ssn'
        ];
    }
}
