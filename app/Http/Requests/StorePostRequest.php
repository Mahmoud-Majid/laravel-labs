<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return 
        [
            'title' => ['required', 'min:3', 'max:255', 'unique:posts'],
            'description' => ['required', 'min:10', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'slug' => ['unique:posts'],
            // 'title' => 'required|unique:posts,title,'.$this->id.'|min:3',
            // 'description' => 'required|min:10',
            // // 'post_creator' => 'required|exists:users,id',
            // 'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:8192'],
            // 'slug' => ['unique:posts'],
        ];
    }
    
    public function messages()
    {
    return [
        'title.required' => 'Title cannot be empty',
        'title.min' => 'Title must be at least 3 characters',
        'description.required' => 'Description cannot be empty',
        'description.min' => 'Description must be at least 5 characters',
    ];
    }   
}