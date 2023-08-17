<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            '*'=>'required',
            'coupon_name'=>'unique:App\Models\Coupon,coupon_name',
            'discount_percentage'=>'numeric|min:1|max:99',
            'validity'=>'date|after:date',
            'limit'=>'numeric|min:1|max:99'
        ];
    }
    function messages(){
       return[
        'limit.numeric'=>'Only accept Number'
       ];
    }
}
