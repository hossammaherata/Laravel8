<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('cms.events.index', ['events' => $events]);
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
