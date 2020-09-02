<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
        return [
            'name' => 'required|max:255|string',
            'content' => 'integer|nullable|max:10000',
            'unit_of_measure' => 'string|nullable|max:50',
            'brand' => 'string|nullable|max:100',
            'price' => 'numeric|nullable|min:1|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El Nombre es obligatorio',
            'content.integer' => 'El Precio debe ser un número entre 0 y 10000',
            'content.max' => 'El Precio debe ser un número entre 0 y 10000'
        ];
    }
}
