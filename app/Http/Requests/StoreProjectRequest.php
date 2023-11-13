<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StoreProjectRequest extends FormRequest
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
            'title' => 'bail|required|min:5|max:100',
            'cover_image' => 'required|image|max:1000',
            'description' => 'bail|required|min:10|max:300',
            'github' => 'nullable|bail|min:3|max:2048',
            'link' => 'nullable|bail|min:3|max:2048',
        ];
    }
}
