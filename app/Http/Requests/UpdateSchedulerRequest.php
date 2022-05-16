<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchedulerRequest extends FormRequest
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
            'route_id' => 'required|integer|exists:routes,id',
            'week_num' => 'required|string',
            'from' => 'required|date',
            'to' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'route_id.required' => 'Se require la ruta',
            'week_num.required' => 'Se requiere el numero de semanas',
            'from.required' => 'Requiere de un ssn',
            'to.required' => 'Requiere de un ssn'
        ];
    }
}
