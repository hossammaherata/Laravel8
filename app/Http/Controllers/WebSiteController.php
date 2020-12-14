<?php

namespace App\Http\Controllers;

use App\Models\WebSite;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WebSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $web = WebSite::first();
        return view('cms.web.index', ['web' => $web]);
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
    //   dd(  $request->get('firstdesc'));


        $web=WebSite::first();
        if(!$web){
             $web = new WebSite();
        }


        $web->firstdesc = $request->get('firstdesc');
        // dd($web->firstdesc);
        $web->first_title = $request->get('first_title');
        $web->sec_desc = $request->get('sec_desc');
        $web->sec_title = $request->get('sec_title');
        $web->thi_desc = $request->get('thi_desc');


         if($request->hasFile('bace_image')){
         $imagefile=$request->file('bace_image');
         $imagename=time().' '.' baceground'.' '.$imagefile->getClientOriginalName();

         $imagefile->move('images/webs',$imagename);
         $web->bace_image=$imagename ;
         }
         if($request->hasFile('sec_image')){
         $imagefile=$request->file('sec_image');
         $imagename=time().' '.' baceground'.' '.$imagefile->getClientOriginalName();

         $imagefile->move('images/webs',$imagename);
         $web->sec_image=$imagename ;
         }
        if($request->hasFile('thi_image')){
         $imagefile=$request->file('thi_image');
         $imagename=time().' '.' baceground'.' '.$imagefile->getClientOriginalName();

         $imagefile->move('images/webs',$imagename);
         $web->thi_image=$imagename ;
         }

         $web->save();
         Alert::success('تم التعديل بنجاح');
         return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebSite  $webSite
     * @return \Illuminate\Http\Response
     */
    public function show(WebSite $webSite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebSite  $webSite
     * @return \Illuminate\Http\Response
     */
    public function edit(WebSite $webSite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebSite  $webSite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebSite $webSite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebSite  $webSite
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebSite $webSite)
    {
        //
    }
}
