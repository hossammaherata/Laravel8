<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin=new Admin();
        $admin->name="hossam";
        $admin->image="efef";
        $admin->viewPassword='Pass123$';
        $admin->password=Hash::make("Pass123$");
        $admin->email='hm@12';
        $admin->save();
        dd(12345);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cms.profile.admin');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $request->validate([
                'name'=>'required',
                'email'=>'required|unique:users,email',
                'image'=>'image',

            ],[
                'name.required'=>'الإسم فارغ',
                'email.required'=>'الإيميل فارغ',
                'email.unique'=>'الإيميل مستخدم من قبل',
                'image.image'=>'يجب أن تكون صورة',
            ]);

            if($request->password){
                $request->validate([
                    'password'=>'required|min:8',
                    'password2'=>'same:password'

                ],[
            'password.required' => 'كلمة السر مطلوبة',
            'password.min' => 'كلمة السر يجب أن تتجاوز 8 حروف',
            'password2.same'=>'يجب أن تكون الكلمتان متطابقتان',

                ]);
            }

        $admin= Admin::find($id);
        $admin->name=$request->get('name');

         if($request->hasFile('image')){
         $imagefile=$request->file('image');
         $imagename=time().' '.'admin'.' '.' '.$imagefile->getClientOriginalName();

         $imagefile->move('images/admins',$imagename);
         $admin->image=$imagename ;
         }
         if($request->password){
             $admin->viewPassword=$request->get('password');
             $admin->password=Hash::make($request->get('password'));
         }


        $admin->email=$request->get('email');

        $admin->save();

        SuccessError::Success('تم التعديل بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
