<?php

namespace App\Modules\Auth\Requests;

use Dedoc\Scramble\Support\OperationExtensions\RulesExtractor\FormRequestRulesExtractor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email:rfc,dns', Rule::unique('users')],
            'password' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name required.',
            'name.string' => 'Name must be a string.',
            'name.unique' => 'Name already used.',

            'email.required' => 'Email address required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'Email address already used.',

            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
        ];
    }
}