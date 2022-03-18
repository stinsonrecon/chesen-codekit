<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'priceRoot'=>'required|numeric',
            'pricePromo'=>'numeric|nullable',
            'status'=>'required',
            'linkImg'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity'=>'required|numeric'
        ];
    }
}
