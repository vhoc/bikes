<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'unique_id' => 'required|uuid',
            'transaction_type_id' => 'required|numeric|digits_between:1,10',
            'agent_id' => 'numeric|digits_between:1,10',
            'user_id' => 'numeric|digits_between:1,10',
            'product_id' => 'numeric|digits_between:1,10',
            'product_serial' => 'required|string|max:255',
            'rental_start' => 'date_format:Y-m-d H:i:s',
            'rental_end' => 'date_format:Y-m-d H:i:s',
            'transaction_amount' => 'max:13|regex:/^\d+(\.\d{1,4})?$/',
            'unregistered_user_firstname' => 'max:64|regex:/[a-zA-Z0-9\s]+/',
            'unregistered_user_lastname' => 'max:64|regex:/[a-zA-Z0-9\s]+/',
            'unregistered_user_phone' => 'numeric|digits_between:10,13'
        ];
    }
}
