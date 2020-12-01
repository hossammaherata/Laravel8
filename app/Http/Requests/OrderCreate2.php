<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreate2 extends FormRequest
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
            'name'=>'required|string',
            'count'=>'required|integer',
            'realprice'=>'required|integer',
            'payprice'=>'required|integer',
            'profitadmin'=>'required|integer'
        ];
    }

     public function messages()
    {
        return [

            'name.required'=>'اسم الصنف مطلوب',
            'count.required'=>'الكمية مطلوبة',
            'realprice.required'=>'سعر الجملة مطلوب',
            'payprice.required'=>'سعر البيع مطلوب ',
            'profitadmin.required'=>'ربح التاجر مطلوب',
            'profitadmin.integer'=>'ربح التاجر يجب أن يكون رقم',

        ];
    }
}
