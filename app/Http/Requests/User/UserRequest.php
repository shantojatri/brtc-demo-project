<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
          /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

          /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd($this->user);
        $rules = [
            "name"                  => ['required', 'string'],
            "email"                 => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            "phone"                 => ['required', 'string'],
            "role"                  => ['required', 'string'],
            "status"                => ['required', 'string'],
            "password"              => ['required', 'confirmed', 'string', 'min:8'],
            "password_confirmation" => ['required', 'string', 'min:8'],
        ];

        if($this->user){
            $rules['password']              = ['nullable', 'confirmed', 'string', 'min:8'];
            $rules['password_confirmation'] = ['nullable', 'string', 'min:8'];
        }

        // dd($rules);
        return $rules;
    }
}
