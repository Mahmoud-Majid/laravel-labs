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
                'title' => ['required', 'unique' ,'min:3'],
                'description' => ['required', 'min:10'],
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