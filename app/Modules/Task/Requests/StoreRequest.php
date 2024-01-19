<?php

namespace App\Modules\Task\Requests;

use Dedoc\Scramble\Support\OperationExtensions\RulesExtractor\FormRequestRulesExtractor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'status' => ['required', Rule::in(['Done', 'In progress', 'Not Started'])]
        ];
    }

    public function attributes()
    {
        return [];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title required.',
            'title.string' => 'Please provide a valid title. It must be a string.',

            'description.required' => 'Description is required.',
            'description.string' => 'Description is required.',

            'status.required' => 'status is required.',
            'status.in' => 'status must be <Done>, <In progress> or <Not Started>.',
        ];
    }
}
