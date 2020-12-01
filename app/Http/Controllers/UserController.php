<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUser;
use App\Http\Requests\UserCreate;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // dd($bill->orders->count());
        $users=User::with('users')->get();

        return view('cms.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('cms.users.create') ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreate $request)
    {
        //
        $user=new User();
        $user->name=$request->get('name');
        $user->idint=$request->get('idint');
        $user->email=$request->get('email');
        $user->viewPassword=$request->get('password');
        $user->address=$request->get('address');
        $user->password=Hash::make($request->get('password'));
        $string=Str::random(20);
        $user->token=Str::uuid();
        $user->profit=0;
        $user->mobile=$request->get('mobile');
        $user->status=$request->get('status')=='on'?'Active':'Wait';

          if($request->hasFile('image')){
         $imagefile=$request->file('image');
         $imagename=time().' '.$string.' '.' '.$imagefile->getClientOriginalName();

         $imagefile->move('images/users',$imagename);
         $user->image=$imagename ;
         }

         $save=$user->save();
         if($save){

            SuccessError::Success('تم الإنشاء بنجاح');
            return redirect()->back();
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user=User::withCount('bills')->where('id',$id)->first();
        return view('cms.users.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($token)
    {

        $user=User::where('token',$token)->first();
        return view('cms.users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUser $request, $id)
    {
     $user=User::find($id);
        $user->name=$request->get('name');
        $user->idint=$request->get('idint');
        $user->address=$request->get('address');
        $string=Str::random(20);


        $user->mobile=$request->get('mobile');
        $user->status=$request->get('status')=='on'?'Active':'Blocked';

          if($request->hasFile('image')){
         $imagefile=$request->file('image');
         $imagename=time().' '.$string.' '.' '.$imagefile->getClientOriginalName();

         $imagefile->move('images/users',$imagename);
         $user->image=$imagename ;
         }

         $save=$user->save();
         if($save){

           Alert::success('تم التعديل بنجاح');
            return redirect()->back();
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
    foreach($user->bills as $item){

        foreach($item->orders as $order){
            $order->delete();
        }
        $item->delete();
    }
   $del= $user->delete();
    //  $del=   $user->billa->delete();
        if($del){
        return response()->json(['icon'=>'success','title'=>'تم الحذف بنجاح  '],200);

        }

        //
    }
}
