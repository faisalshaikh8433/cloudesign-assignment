<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class ValidateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('product-crud');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'category_id'=>'required',
            'rate'=> 'required|regex:/^\d+(\.\d{1,2})?$/',
            'qty'=> 'regex:/^\d+(\.\d{1,2})?$/',
			'cost'=> 'regex:/^\d+(\.\d{1,2})?$/',
			'photo'=>'image|max:4999',
        ];
    }
    
    public function messages()
    {
        return [
            'rate.regex' => 'Rate must be a numeric value',
            'qty.regex' => 'Quantity must be a numeric value',
            'cost.regex' => 'Cost must be a numeric value',
        ];
    }
}
