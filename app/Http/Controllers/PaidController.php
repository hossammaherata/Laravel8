<?php

namespace App\Http\Controllers;

use App\Models\Paid;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paids = Paid::all();
        return view('cms.paids.index', ['paids' => $paids]);
    }

    public function PrintUsersPaid(Request $request)
    {
        // dd($request->get('to'));


        if (!$request->get('from') || !$request->get('to')) {
            Alert::warning('الرجاء إكمال باقي التاريخ  ');
            return redirect()->back();
        }
        $froms = $request->get('from');
        $tos = $request->get('to');


        $from = Carbon::create($request->from, 'US/Central');
        $to = Carbon::create($request->to, 'US/Central');


        $users = User::with(['bills' => function ($query) use ($from, $to) {

            $query->where('created_at', '>=', $from)->where('created_at', '<=', $to)->withTrashed()->with('orders');
        }])->withTrashed()->withCount('bills')->get();




        return view('cms.paids.users', ['users' => $users, 'from' => $froms, 'to' => $tos]);
    }

    public function userPaid(Request $request)
    {

        if (!$request->get('from') || !$request->get('to')) {
            Alert::warning('الرجاء إكمال باقي التاريخ  ');
            return redirect()->back();
        }
        $froms = $request->get('from');
        $tos = $request->get('to');


        $from = Carbon::create($request->from, 'US/Central');
        $to = Carbon::create($request->to, 'US/Central');


        $users = User::with(['bills' => function ($query) use ($from, $to) {

            $query->where('created_at', '>=', $from)->where('created_at', '<=', $to)->withTrashed()->with('orders');
        }])->withTrashed()->withCount('bills')->where('id',5)->get();




        return view('cms.paids.users', ['users' => $users, 'from' => $froms, 'to' => $tos]);
    }

    public function reprotspaidusers(Request $request)
    {

        if (!$request->get('from') || !$request->get('to')) {
            Alert::warning('الرجاء إكمال باقي التاريخ  ');
            return redirect()->back();
        }
        $object = $this->PrintUsersPaid($request);
        $from = Carbon::create($object->from);
        $to = Carbon::create($object->to);
        return view('cms.reports.paidusers', ['users' => $object->users, 'to' => $to, 'from' => $from]);
    }

    public function getpaid($id)
    {
        // return 10;
        return view('cms.paids._edit', ['paid' => Paid::find($id)]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        if (!$request->value || !$request->to || !$request->from) {
            Alert::warning('الرجاء إدخال كافة البيانات');
            return redirect()->back();
        }

        $paid = new Paid();
        $paid->value = $request->get('value');
        $paid->to = $request->get('to');
        $paid->note = $request->note;
        $paid->from = $request->get('from');

        $save = $paid->save();
        if ($save) {


            Alert::success('تمت إضافة الدفعة بنجاح');
            return redirect()->route('paid.index');
        } else {
            Alert::warning('هناك خطأ');
            return redirect()->back();
        }
        // $paid->admin_id=Auth::id();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paid  $paid
     * @return \Illuminate\Http\Response
     */
    public function show(Paid $paid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paid  $paid
     * @return \Illuminate\Http\Response
     */
    public function edit(Paid $paid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paid  $paid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (!$request->value || !$request->to || !$request->from) {
            Alert::warning('الرجاء إدخال كافة البيانات');
            return redirect()->back();
        }

        $paid =  Paid::find($id);
        $paid->value = $request->get('value');
        $paid->to = $request->get('to');
        $paid->note = $request->note;
        $paid->from = $request->get('from');

        $save = $paid->save();
        if ($save) {


            Alert::success('تم تعديل الدفعة بنجاح');
            return redirect()->route('paid.index');
        } else {
            Alert::warning('هناك خطأ');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paid  $paid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paid $paid)
    {
        //
    }
}
