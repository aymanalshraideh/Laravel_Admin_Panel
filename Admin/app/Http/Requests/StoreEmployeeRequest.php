<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'e_firstname' => 'required',
            'e_lastname' => 'required',
            'e_email' => 'required|unique:employees',
            'e_phone' => 'required|unique:employees',
            'company'=>'required'
        ];
    }
}
