<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Twit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccessController extends Controller
{
    //
    public function twit(){


        return view('user.twit',['twits'=>Twit::all()]);
    }
      public function contact(){

        $contact=Contact::first();
        return view('user.contact',['contact'=>$contact]);

    }

    public function getviewprofile(){

    //   $user = Auth::user()->name;
    //   dd($user);
        return view('cms.profile.user');
    }
    public function store(Request $request){

        $id=Auth::id();
              $request->request->add(['id' =>Auth::id()]);

            $request->validate([
            'name' => 'required|string|min:8|max:45',
            'mobile' => 'required|numeric|unique:users,mobile,'.$id,
            'idint'=>'required|integer|unique:users,idint,'.$id,
            'address' => 'required|string|min:3',
                'image'=>'image',

            ],[

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
            'address.required' => 'العنوان مطلوب',
            'address.min' => 'أحرف العنوان أقل من 3',
            'idint.integer'=>'يجب أن يكون رقم',
            ]);

            if($request->password){
                $request->validate([
                    'current_password' => 'required|string|password:user',
                    'password'=>'required|min:5',
                    'password2'=>'same:password'

                ],[
                    'current_password.required'=>'كلمة السر الحالية فارغة',
                    'current_password.password'=>'كلمة السر الحالية خاطئة',

            'password.required' => 'كلمة السر مطلوبة',
            'password.min' => 'كلمة السر يجب أن تتجاوز 8 حروف',
            'password2.same'=>'يجب أن تكون الكلمتان متطابقتان',


                ]);
            }

        $user= User::find($id);
        // dd($user->name);
        $user->name=$request->get('name');
                $user->address=$request->get('address');


         if($request->hasFile('image')){
         $imagefile=$request->file('image');
         $imagename=time().' '.'users'.' '.' '.$imagefile->getClientOriginalName();

         $imagefile->move('images/users',$imagename);
         $user->image=$imagename ;
         }
         $user->idint=$request->get('idint');
         $user->mobile=$request->get('mobile');
         if($request->password){
             $user->viewPassword=$request->get('password');
             $user->password=Hash::make($request->get('password'));
         }


        // $admin->email=$request->get('email');

        $user->save();

        SuccessError::Success('تم التعديل بنجاح');
        return redirect()->back();
    }


}
