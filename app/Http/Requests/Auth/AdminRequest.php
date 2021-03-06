<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'username' => 'required|max:255|unique:admin',
            'password' => 'required|min:6',
            'password_confirm'=>'required|same:password|min:6',
            'linkImg'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
