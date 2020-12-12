<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Event;
use App\Models\UserEvent;
use App\Notifications\EndNotif;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::withCount('users')->get();
        return view('cms.events.index', ['events' => $events]);
    }
    public function events(){

        $events=Event::where('status','Visible')->get();
        return view('user.events.index',['events'=>$events,'show'=>'yes']);
    }

      public function userEnd(){

        $events=Event::where('status','Visible')->get();
        return view('user.events.index',['events'=>$events,'show'=>'yes']);
    }

    public function add($id,$ev){

        $event=Auth::user()->details()->where('event_id',$ev)->get();
        // dd(count($event));

        // dd($event);
        if($event->count()==0){


        $add=new UserEvent();
        $add->user_id=Auth::id();
        $add->event_id=$ev;
        $add->save();
        Alert::success('تم التسجيل بالمسابقة');
        }
        else{
            Alert::warning('انت بالفعل مشترك بالمسابقة');
        }
        return redirect()->back();

    }

     public function end($id,$ev){

        // $event=Auth::user()->details()->where('event_id',$ev)->get();
        // dd(count($event));

        // dd($event);


        // dd($ev);


        $add=UserEvent::where('event_id',$ev)->where('user_id',Auth::id())->first();
       if($add){

         $add->end='yes';
        $add->save();

        foreach(Admin::all() as $item){

                  $note=new EndNotif(Auth::user()->name,$add);
              $item->notify($note);
        }

        Alert::success('تم تسجيل الإنهاء');
       }
       else
       {
                   Alert::warning('أنت غير مسجل بالمسابقة');

       }



        return redirect()->back();

    }

    public function store(Request $request)
    {

        // dd($request->desc);

        if (!$request->desc) {
           Alert::warning('الرجاء   تعبئة الوصف');
            return redirect()->back();
        }
        if (!$request->image) {
            Alert::warning('الرجاء   وضع صورة');
            return redirect()->back();
        }

        $event = new Event();

        $event->desc = $request->get('desc');
        if ($request->hasFile('image')) {

            $string = Str::random(20);
            $imagefile = $request->file('image');
            $imagename = time() . ' ' . $string . ' ' . ' ' . $imagefile->getClientOriginalName();

            $imagefile->move('images/events', $imagename);
            $event->image = $imagename;

        }
         $event->end = Carbon::create($request->end, 'US/Central');
        $event->status = $request->get('status') == 'on' ? 'Visible' : 'InVisible';
        $save = $event->save();
        if ($save) {
            Alert::success('تم إنشاء المسابقة بنجاح');
            return redirect()->route('event.index');
        }

    }

    public function edit($id){
        $event=Event::find($id);

        return view('cms.events._edit',['event'=>$event]);
    }
    public function delete($id)
    {
        $event = Event::find($id);

        // ret

        foreach($event->details as $item){
            $item->delete();
        }
        $del = $event->delete();
        if ($del) {
            return response()->json(['icon' => 'success', 'title' => 'تم الحذف بنجاح  '], 200);

        }

    }

    public function update(Request $request , $id){


           if (!$request->desc) {
            Alert::warning('الرجاء   تعبئة الوصف');
            return redirect()->back();
        }


        $event =Event::find($id);

        $event->desc = $request->get('desc');
        if ($request->hasFile('image')) {

            $string = Str::random(20);
            $imagefile = $request->file('image');
            $imagename = time() . ' ' . $string . ' ' . ' ' . $imagefile->getClientOriginalName();

            $imagefile->move('images/events', $imagename);
            $event->image = $imagename;
        }
                 $event->end = Carbon::create($request->end, 'US/Central');

        $event->status = $request->get('status') == 'on' ? 'Visible' : 'InVisible';
        $save = $event->save();
        if ($save) {
            Alert::success('تم التعديل  بنجاح');
            return redirect()->back();
        }
    }

}
