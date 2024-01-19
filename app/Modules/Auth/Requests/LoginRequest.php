<?php

namespace App\Modules\Auth\Requests;

use Dedoc\Scramble\Support\OperationExtensions\RulesExtractor\FormRequestRulesExtractor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required'],
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email address required.',
            'email.email' => 'Please provide a valid email address.',

            'password.required' => 'Password is required.',
        ];
    }
}