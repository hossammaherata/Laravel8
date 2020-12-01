<?php

namespace App\Http\Controllers;

use App\Http\Requests\TwitRequest;
use App\Models\Twit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TwitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cms.twits.index',['twits'=>Twit::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.twits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TwitRequest $request)
    {
        //
           $twit= new Twit();
        $twit->name=$request->get('name');
        $twit->href=$request->get('href');
          $token=Str::uuid();
          $twit->token=$token;
        $save=  $twit->save();
          if($save){
              SuccessError::Success('تم إنشاء القناة بنجاح');
          return redirect()->back();

          }
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Twit  $Twit
     * @return \Illuminate\Http\Response
     */
    public function show(Twit $Twit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Twit  $Twit
     * @return \Illuminate\Http\Response
     */
    public function edit($token)
    {
        $twit=Twit::where('token',$token)->first();
        return view('cms.twits.edit',['twit'=>$twit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Twit  $Twit
     * @return \Illuminate\Http\Response
     */
    public function update(TwitRequest $request, $id)
    {
          $twit= Twit::find($id);
        $twit->name=$request->get('name');
        $twit->href=$request->get('href');


        $save=  $twit->save();
          if($save){
              SuccessError::Success('تم إنشاء القناة بنجاح');
          return redirect()->route('twit.index');

          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Twit  $Twit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=Twit::find($id)->delete();

       if ($del){
              return response()->json(['icon'=>'success','title'=>'تم الحذف بنجاح  '],200);
              }else{
              return response()->json(['icon'=>'error','title'=>'فشل الحذف'],400);
              }
    }
}
