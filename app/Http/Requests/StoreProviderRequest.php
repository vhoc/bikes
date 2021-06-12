<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
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
            'name' => 'required|max:128|regex:/[a-zA-Z0-9\s]+/',
            'address' => 'max:512|regex:/[a-zA-Z0-9\s]+/',
            'phone' => 'numeric|digits_between:10,13',
            'email' => 'email|max:128',
            'url' => 'url|max:512'
        ];
    }
}
