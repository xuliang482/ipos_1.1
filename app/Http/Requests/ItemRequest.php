<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class ItemRequest extends FormRequest
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
            'upc_ean_isbn' => 'required',
            'name' => 'required',
            'category' => 'required',
            'cost_price' => 'required',
            'selling_price' => 'required',
            'avatar' => 'mimes:jpeg,bmp,png'
        ];
    }
    
    public function messages()
    {
        return [
            'upc_ean_isbn.required'    => Lang::get('item.validation_upc_ean_isbn_required'),
            'name.required'    => Lang::get('item.validation_name_required'),
            'category.required'    => Lang::get('item.validation_category_required'),
            'cost_price.required'    => Lang::get('item.validation_cost_price_required'),
            'selling_price.required'    => Lang::get('item.validation_selling_price_required'),
            'avatar.mimes' => 'Not a valid file type. Valid types include jpeg, bmp and png.'
        ];
    }
}
