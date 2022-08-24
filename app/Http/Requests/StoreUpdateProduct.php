<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduct extends FormRequest
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
            'title' => ["required", "max:200", "unique:products,title,{$this->id}"],
            'description' => ['nullable', 'max:500'],
            'brand_id' => ['nullable', 'exists:brands,id', 'integer']
        ];
    }
}
