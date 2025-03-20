<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Categories;

class ProductRules extends FormRequest
{
    /*public function authorize(): bool
    {
        return true;
    }*/

    public function rules(): array
    {
        return [
            'name'=>'required',
            'category_id'=>Rule::in(Categories::pluck('id')),
            'price'=>'required|numeric',
            'description'=>'required'
        ];
    }
}
