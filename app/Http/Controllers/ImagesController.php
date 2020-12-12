<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Images;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $image= Images::first();
        return view('cms._imagelogin',['image'=>$image]);
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
        $image=Images::first();
        if(!$image){
            $image=new Images();
        }
         if($request->hasFile('image')){
         $imagefile=$request->file('image');
         $imagename=time().' '.'4545'.' '.' '.$imagefile->getClientOriginalName();

         $imagefile->move('images/images',$imagename);
         $image->imagelogin=$imagename ;
         }
         $image->save();
           Alert::success('تم الإنشاء بنجاح');
           return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        //
    }
}
