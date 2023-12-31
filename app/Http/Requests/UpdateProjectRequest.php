<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::id() === 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'min:5', 'max:100', 'unique:projects'],
            'description' => ['bail', 'required', 'min:10', 'max:300'],
            'cover_image' => ['bail', 'required', 'image', 'max:1000'],
            'link' => ['bail', 'nullable', 'string', 'max:255', Rule::unique('projects')],
            'github' => ['bail', 'nullable', 'string', 'max:255', Rule::unique('projects')],
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }
}
