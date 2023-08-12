<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'price' => 'required|min_digits:0',
            'category' => 'required|exists:categories,id',
            'pic' => 'mimes:jpg,bmp,png',
            'des' => 'required|max:255',
        ];
    }
}
