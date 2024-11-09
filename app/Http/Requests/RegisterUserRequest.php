<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,professor,student'],
            'prefix' => ['required', 'in:MS,MR,MRS'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'regex:/^(0[6892]{1})\d{8}$/', 'max:10'],
        ];

        // Role-specific rules
        if ($this->role == 'student') {
            $rules['student_id'] = ['required', 'string', 'regex:/^\d{10}$/', 'unique:students'];
            $rules['department'] = ['required', 'in:CS,IT'];
            $rules['address_id'] = ['nullable', 'integer', 'exists:addresses,address_id'];
        } elseif ($this->role == 'professor') {
            $rules['professor_id'] = ['required', 'string', 'size:10', 'unique:professors'];
            $rules['remark'] = ['nullable', 'string', 'max:255'];
            $rules['status'] = ['required', 'in:active,no_active'];
        } else {
            $rules['status'] = ['required', 'in:active,no_active'];
        }

        return $rules;
    }
}
