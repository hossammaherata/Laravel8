<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
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
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users,mobile',
            'image' => 'image',
            'address' => 'required|string|min:3',
            'password' => 'required|string|min:5',
            'password2'=>'same:password',
            'status' => 'string|in:Blocked,Active,Wait',
            'idint'=>'required|unique:users,idint|integer'

        ];


    }

      public function messages()
    {
        return [

            'name.required' => 'الاسم مطلوب',
            'mobile.required' => 'الهاتف مطلوب',
            'mobile.numeric' => ' يجب أن يكون أرقام',
            'mobile.unique' => 'تم استخدام هذا الرقم من قبل',
            'name.min' => 'أحرف الاسم أقل من 5 ',
            'name.max' => 'أحرف الاسم أكبر من 45 ',
            'image.image' => 'يجب أن تكون صورة',
            'idint.unique' => 'هذا الرقم مسجل من قبل ',
            // 'idint.size' => 'رقم الهوية يجب أن يتكون من 9 خانات',
            'idint.required' => 'رقم الهوية مطلوب',
            'email.required' => 'الإيميل مطلوب',
            'email.email' => 'الإيميل خاطئ',
            'email.unique' => 'هذا الحساب مسجل من قبل ',
            'address.required' => 'العنوان مطلوب',
            'address.min' => 'أحرف العنوان أقل من 3',
            'password.required' => 'كلمة السر مطلوبة',
            'password.min' => 'كلمة السر يجب أن تتجاوز 8 حروف',
            'password2.same'=>'يجب أن تكون الكلمتان متطابقتان',
            'idint.integer'=>'يجب أن يكون رقم',
        ];
    }



}
