<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUser extends FormRequest
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
            //
            'name' => 'required|string|min:8|max:45',
            'mobile' => 'required|numeric',
            'image' => 'image',
            'address' => 'required|string|min:3',
            'status' => 'string|in:Blocked,Active,Wait',
            'idint'=>'required|integer'

        ];

    }
     public function messages()
    {
        return [

            'name.required' => 'الاسم مطلوب',
            'mobile.required' => 'الهاتف مطلوب',
            'mobile.numeric' => ' يجب أن يكون أرقام',
            'name.min' => 'أحرف الاسم أقل من 8 ',
            'name.max' => 'أحرف الاسم أكبر من 45 ',
            'image.required' => 'الرجاء رفع صورة',
            'image.image' => 'يجب أن تكون صورة',
            'idint.required' => 'رقم الهوية مطلوب',
            'email.required' => 'الإيميل مطلوب',
            'email.email' => 'الإيميل خاطئ',
            'address.required' => 'العنوان مطلوب',
            'address.min' => 'أحرف العنوان أقل من 3',
            'idint.integer'=>'يجب أن يكون رقم',
        ];
    }
}
