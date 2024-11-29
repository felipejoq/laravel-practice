<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

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
            // Validate image is an url
            'image' => 'required|url',
            'content' => 'required|min:3',
            'category_id' => 'required|integer|exists:categories,id',
            // 'slug' => 'required|unique:posts,slug',
            'status' => 'required|in:draft,published',
        ];
    }
}
