<?php

namespace App\Http\Controllers;

use App\Models\AllNot;
use App\Models\User;
use App\Notifications\UserNotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AllNotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=AllNot::all();
        return view('cms.messages.index',['messages'=>$messages]);
    }

    public function MyMessage(){
                return view('user.messages.index',['messages'=>Auth::user()->messages]);

    }
     public function showuser($id)
    {
        // return 10;
$message=AllNot::find($id);
    //  return $message->id;
        return view('user.messages._show',['message'=>$message]);
        //
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
        $users=User::all();

        foreach($users as $item){


         $message=new AllNot();
         $message->name=$item->name;
         $message->title=$request->get('title');
        $message->body=$request->get('body');
        $message->user_id=$item->id;
        $save=$message->save();

           $note=new UserNotif($message);
              $item->notify($note);

        }



                Alert::success('تم إرسال الرسالة');
                return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AllNot  $allNot
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message=AllNot::find($id);
        return view('cms.messages._show',['message'=>$message]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AllNot  $allNot
     * @return \Illuminate\Http\Response
     */
    public function edit(AllNot $allNot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AllNot  $allNot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllNot $allNot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AllNot  $allNot
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $del=AllNot::destroy($id);
         if($del){
        return response()->json(['icon'=>'success','title'=>'تم الحذف بنجاح  '],200);

        }
    }

    public function user(Request $request){

        $message=new AllNot();
        $user=User::find($request->get('user_id'));
         $message->name=$user->name;
                 $message->title=$request->get('title');
        $message->body=$request->get('body');
        $message->user_id=$request->get('user_id');
        $save=$message->save();
        if($save)
            {
                 $note=new UserNotif($message);
              $user->notify($note);
                Alert::success('تم إرسال الرسالة');
                return redirect()->back();

            }
        }
}
