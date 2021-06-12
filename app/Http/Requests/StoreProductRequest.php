<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'images'    => json_encode( $this->images ),
            'acquired'  => json_encode( $this->acquired )
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_type_id'   => 'required|numeric|digits_between:1,99999',
            'product_brand_id'  => 'required|numeric|digits_between:1,99999',
            'model'             => 'required|max:255|regex:/[a-zA-Z0-9\s]+/',
            'year_model'        => 'numeric|digits_between:4,4',
            'serial'            => 'required|max:255',
            'wheel_size'        => 'required|max:255|regex:/[a-zA-Z0-9\s]+/',
            'color_id'          => 'numeric|digits_between:1,999',
            'description'       => 'required|regex:/[a-zA-Z0-9\s]+/|max:512',
            'images'            => 'json',
            'acquired'          => 'json',
            'last_maintenance'  => 'date',
            'due_maintenance'   => 'date'
        ];
    }
}
