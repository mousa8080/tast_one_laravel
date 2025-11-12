<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\Filter;

class CreatePostRequest extends FormRequest
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
        return [
            'title' => [
                'required',
                'min:5',
                'max:255',
            ],
            'content' => [
                'required',
                'min:5',
                'max:1000',
                new Filter(['php','laravel']),
                'filter:php,laravel',
            ],


        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Enter title',
            'title.min' => 'title must be at least 5 characters',
            'title.max' => 'title must be at least 255 characters',
            'content.required' => 'Enter content',
            'content.min' => 'content must be at least 5 characters',
            'content.max' => 'content must be at least 1000 characters',
        ];
    }
    
}
