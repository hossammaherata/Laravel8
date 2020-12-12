<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Images;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{
    //
    public function billindex(Request $request)
    {
        $from = Carbon::create($request->get('from'));
        $to = Carbon::create($request->to);

        $bills = Bill::with(['user' => function ($query) {
            $query->withTrashed();
        }])->with(['orders' => function ($query) {
            $query->withTrashed();
        }])->orderBy('created_at', 'DESC')->withTrashed()->get();
        $frombill = $bills->where('created_at', '>=', $from);
        $bills = $frombill->where('created_at', '<=', $to);

        return view('cms.bills.index', ['bills' => $bills, 'search' => 'no', 'from' => $from, 'user_id' => null, 'to' => $to, 'print' => 'all']);

    }

    public function UserBillIndex(Request $request)
    {

        $from = Carbon::create($request->get('from'));
        $to = Carbon::create($request->to);
        $object = $this->billindex($request);
        $bills = $object->bills->where('user_id', $request->user_id);
        return view('cms.bills.index', ['bills' => $bills, 'search' => 'no', 'from' => $from, 'to' => $to, 'user_id' => $request->get('user_id'), 'print' => 'user']);
    }



    public function databill(Request $request)
    {
        $from = Carbon::create($request->get('from'));
        $to = Carbon::create($request->to);
        $object = $this->billindex($request);
        $bills = $object->bills;
        $image=Images::first();
        return view('cms.reports.bills', ['bills' => $bills, 'data' => 'yes', 'from' => $from, 'to' => $to, 'name' => null,'image'=>$image]);

    }

    public function databilluser(Request $request)
    {
        $from = Carbon::create($request->get('from'));
        $to = Carbon::create($request->to);
        $object = $this->UserBillIndex($request);
        $bills = $object->bills;
        $user = User::find($request->user_id);

        $image=Images::first();
        return view('cms.reports.bills', ['bills' => $bills, 'data' => 'yes', 'from' => $from, 'to' => $to, 'name' => $user->name,'image'=>$image]);

    }

    public function Authuserbill(Request $request){

        // dd(54);
              $from = Carbon::create($request->get('from'));
        $to = Carbon::create($request->to);
                $object = $this->billindex($request);
                 $bills = $object->bills->where('user_id', Auth::id());
                //  dd($bills->sum('profit'));
                 $image=Images::first();
        return view('cms.reports.user', ['bills' => $bills,  'from' => $from, 'to' => $to, 'image'=>$image ]);



    }

    public function indexbill()
    {

        $bills = Bill::with('user', 'orders')->orderBy('created_at', 'DESC')->get();

        return view('cms.reports.bills', ['bills' => $bills, 'data' => 'no']);

    }

}
