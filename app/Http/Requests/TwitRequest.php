<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\PseudoTypes\True_;

class TwitRequest extends FormRequest
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
               'name'=>'required|string|min:3',
                'href' => 'required|string'
        ];
    }
     public function messages()
    {
        return [

            'name.required'=>'اسم الفئة مطلوب',
            'name.min'=>'أقل من ثلاث حروف',
            'href.required'=>'رابط القناة مطلوب',
        ];
    }
}
