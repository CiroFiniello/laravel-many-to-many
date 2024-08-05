<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
                "title" => ["required", "unique:projects","min:3", "max:255"],
                "image" => ["required", "image"],
                "technologies"=> ['required', 'array'],
                "content" => ["required", "string","min:20", "max:255"],
                "type_id" => ["required", "string", "max:255", "exists:types,id"],
        ];
    }
}
