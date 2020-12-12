<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cms.bills.index',['bills'=>Bill::with(['user'=>function($query){
            $query->withTrashed();
        }])->orderBy('created_at', 'DESC')->get(),'search'=>'yes']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users=User::where('status','Active')->get();
        return view('cms.bills.users',['users'=>$users]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $bill=new Bill();
        $bill->name=$request->get('name')? $request->get('name'):"لا يوجد اسم ";
        $bill->mobile=$request->get('mobile')? $request->get('mobile'):"لا يوجد رقم ";
        $bill->user_id=$request->get('iduser');
        $bill->profit=0;
        $bill->realprice=0;
        $bill->created_at=$request->get('created_at');
        $bill->token=Str::uuid();
        $save=$bill->save();
        $cust=Bill::with('user')->where('id',$bill->id)->first();
        if($save){
            Alert::success('تم الإنشاء بنجاح');
             return view('cms.orders.create',['bill'=>$cust]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('cms.bills._edit',['item'=>Bill::find($id)]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'mobile'=>'required|numeric',
            'name'=>'required',
        ],[
            'mobile.required'=>'رقم الهاتف مطلوب',
            'mobile.numeric'=>'رقم الهاتف يجب أن يكون رقم',
            'name.required'=>'اسم الزبون مطلوب',
        ]);
        $bill=Bill::find($id);
         $bill->name=$request->get('name')? $request->get('name'):"لا يوجد اسم ";
        $bill->mobile=$request->get('mobile')? $request->get('mobile'):"لا يوجد رقم ";
                $bill->status=$request->get('status');

        $bill->save();
        Alert::success('تم التعديل  بنجاح');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill=Bill::find($id);

        foreach($bill->orders as $item){
            $item->delete();
        }
     $del=   $bill->delete();
      if($del){
        return response()->json(['icon'=>'success','title'=>'تم الحذف بنجاح  '],200);

        }
    }
}
