<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class CustomerRequest extends FormRequest
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
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'avatar' => 'mimes:jpeg,bmp,png'
        ];
    }

    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'    => Lang::get('customer.validation_name_required'),
            'phone_number.required'    => Lang::get('customer.validation_phone_number_required'),
            'email.required'    => Lang::get('customer.validation_email_required'),
            'email.email'    => Lang::get('customer.validation_email_address')
        ];
    }

}
