<?php

namespace App\Http\Requests;

use App\Models\Products;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRules extends FormRequest
{
    /*public function authorize(): bool
    {
        return false;
    }*/

    public function rules(): array
    {
        return [
            'product_id'=>Rule::in(Products::pluck('id')),
            'quantity'=>'required|numeric',
            'customer'=>'required',
            'comment'=>'required',
            'status'=>'required'
        ];
    }
}