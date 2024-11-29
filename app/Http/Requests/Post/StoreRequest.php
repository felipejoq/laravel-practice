<?php

namespace App\Http\Requests\Post;

use App\Rules\ImageUrlOrDefault;
use App\Rules\NoSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'title' => 'required|min:3|max:255',
            'excerpt' => 'required|min:3|max:255',
            'image' => ['nullable', new ImageUrlOrDefault],
            'content' => 'required|min:3',
            'category_id' => 'required|integer|exists:categories,id',
            'slug' => [
                new NoSpaces,
                Rule::unique('posts')->ignore($this->post),
            ],
            'status' => 'required|in:draft,published',
        ];
    }
}
