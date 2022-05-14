<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverRequest extends FormRequest
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
            'first_name.required' => 'Requiere de un nombre',
            'last_name.required' => 'Requiere de un apellido',
            'ssn.required' => 'Requiere de un ssn',
            'dob.required' => 'Requiere de un dob',
            'address.required' => 'Requiere de un address',
            'city.required' => 'Requiere de un city',
            'zip.required' => 'Requiere de un zip',
            'phone.required' => 'Requiere de un phone',

        ];
    }
}
