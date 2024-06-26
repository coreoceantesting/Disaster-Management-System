<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'role' => 'nullable',
            'name' => 'required',
            'gender' => 'nullable',
            'dob' => 'nullable',
            'department_id' => 'required',
            'fire_station_id' => 'nullable',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
        ];
    }
}
