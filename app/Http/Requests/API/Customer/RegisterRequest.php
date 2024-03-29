<?php

namespace App\Http\Requests\API\Customer;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'phone' => ['required', 'phone:MA', 'unique:customers'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            //'password' => ['required', 'string', 'min:8'],
        ];
    }
}
