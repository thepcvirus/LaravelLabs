<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        'title' => 'required|min:3|unique:posts,title,' . $this->id,
        'description' => 'required|min:10|max:200',
        //'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
    ];
    }

    public function message(){
        return [
            'title.required' => 'Title is required',
            'title.max' => 'Title must not exceed 5 characters',
            'description.required' => 'Description is required',
            'description.max' => 'Description must not exceed 20 characters',
            // 'image.required' => 'Please select an image file.',
            // 'image.image' => 'The file must be an image.',
            // 'image.mimes' => 'Only JPEG, PNG, JPG files are allowed.',
            // 'image.max' => 'The image must not be larger than 5MB.',
        ];
    }
}
