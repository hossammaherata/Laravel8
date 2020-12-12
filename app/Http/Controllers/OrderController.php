<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreate2;
use App\Http\Requests\OrderCreate;
use App\Models\Bill;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function hh(){
        $bills=Bill::all();
        dd($bills->where('name',1));
    //   $bills=Bill::whereHas('user',function($query) use($text){
    //         $query->where('name','like','%'.$text.'%');
    //     })->get();
        dd($bills->count());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function build($token)
    {
        //

        $user = User::where('token', $token)->first();

        return view('cms.orders.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderCreate $request)
    {
        if (!$request->get('created_at')) {
            Alert::warning('الرجاء وضع تاريخ', 'فشلت العملية');
            return redirect()->back()->withInput();
        }

        $bill = new Bill();
        $bill->name = $request->get('namebill');
        $bill->mobile = $request->get('mobilebill');
        $bill->user_id = $request->get('user_id');
        $bill->profit = 0;
        $bill->realprice = 0;
        $bill->total = 0;
        $bill->created_at = $request->get('created_at');
        $bill->token = Str::uuid();
        $save = $bill->save();
        if ($save) {

            $order = new Order();

            $order->name = $request->get('name');
            $order->count = $request->get('count');
            $order->realprice = $request->get('realprice');
            $order->payprice = $request->get('payprice');

            $order->created_at = $bill->created_at;
            $order->profit = 0;

            $order->bill_id = $bill->id;

            // $price=$request->get('realprice');
            // $pay=$request->get('payprice');
            //   $count=  $request->get('count');

            // $order->profit =($pay*$count-$price*$count)-30;

            $save = $order->save();

            if ($save) {
                $total = $bill->total;
                $real = $bill->realprice;
                $bill->total = $request->get('payprice') * $request->get('count') + $total;
                $bill->realprice = $request->get('realprice') * $request->get('count') + $real;
                $bill->save();
                SuccessError::Success('تم إضافة الصنف بنجاح');
                return redirect()->route('order.get.create2', [$bill->id]);
            }

        }
    }

    public function create2($id)
    {

        // $f=Bill::find($id);

        $bill = Bill::with(['orders' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->with(['user'=>function($query){
            $query->withTrashed();
        }])->withTrashed()->where('id', $id)->first();
        return view('cms.orders.create2', ['bill' => $bill]);
    }

    public function ordercreate2(OrderCreate2 $request)
    {

        $order = new Order();
        $order->name = $request->get('name');
        $order->count = $request->get('count');
        $order->realprice = $request->get('realprice');
        $order->payprice = $request->get('payprice');
        $order->profitadmin=$request->get('profitadmin');
        // $order->created_at = $request->get('created_at') ? $request->get('created_at') : now();
        $order->bill_id = $request->get('bill_id');
        $order->profit = 0;
        $isSave = $order->save();
        // $bill = $order->bill->orderByDesc('created_at');

        if ($isSave) {
            $bill = $order->bill;
            $total = $bill->total;
            $real = $bill->realprice;
            $bill->total = $request->get('payprice') * $request->get('count') + $total;
            $bill->realprice = $request->get('realprice') * $request->get('count') + $real;
            $order->created_at=$bill->created_at;
            $order->save();
            $bill->save();
            SuccessError::Success('تم إضافة الصنف بنجاح');
            return redirect()->back();

        } else {
            SuccessError::Error(' فشلت الإضافة  ');
            return redirect()->back();}
        // return view('cms.orders._search',['bill'=>Bill::where('id',$request->get())]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('cms.orders._edit', ['item' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderCreate2 $request, $id)
    {


        // s
        // $cheksuccess=0;
        $bill = Order::find($id)->bill;
        $allProfit = $bill->orders->where('status', 'success')->count() > 0 ? $bill->orders->sum('profit') - 30 : $bill->orders->sum('profit');

        $order = Order::find($id);
        if(($order->status =='wait'|| $order->status =='cancel')&&$request->status== 'return' ){

            session()->flash('status', 'alert-danger');
            session()->flash('message', 'قبل وضع الإرجاع يجب إختيار تسليم ');
            return redirect()->back();


        }

        if ($order->status != 'success' && $request->get('status') == 'success') {
            // 9-12-2020
            // الأصل ليست ناجحة والقادمة نجاح
            // if($order->status=='')
            $price = $request->get('realprice');
            $pay = $request->get('payprice');
            $count = $request->get('count');
            ////////////////////////////
            // user profit

            $order->profit = ($pay * $count - $price * $count);
            ///////////////////30///////////
            $user = $order->bill->user;
            $user->profit -= $allProfit;
            $user->save();
            $order->note=null;
            $order->save();
            if($order->status=='return'){
                            $user->profit+=$order->discount;
                            $order->discount=0;
                            $order->save();
                            $user->save();
                            // dd($user->profit);

            }


            $user->profit += $bill->orders->sum('profit') - 30 + $order->profit ;
            $order->discount=0;
            $order->save;

            $user->save();

        }
        elseif ($order->status == 'success' && $request->get('status') == 'success') {

            // الاصل ناجحة والقادمة نجاح
            $price = $request->get('realprice');
            $pay = $request->get('payprice');
            $count = $request->get('count');

            $orderprofit = $order->payprice * $order->count - $order->realprice * $order->count;
            $user = $order->bill->user;
            $user->profit = $user->profit - $orderprofit;
            $order->profit = ($pay * $count - $price * $count);
            $user->profit = $user->profit + $order->profit;
               $order->note=null;
            $order->save();

            $user->save();

        }

        elseif ($order->status == 'success'  && ($request->get('status') == 'wait' || $request->get('status') == 'cancel' || $request->get('status') == 'return')) {
            // الأصل ناجحة والقادمة ليست نجاح



         $price = $order->realprice;
            $pay = $order->payprice;
            $count = $order->count;

            $order->profit = $order->profit - ($pay * $count - $price * $count);
            $order->note=null;

            $minprofit = $order->payprice * $order->count - $order->realprice * $order->count;
            $user = $order->bill->user;
            $min = $bill->orders->where('status', 'success')->count() == 1 ? 30 : 0;

            $user->profit = $user->profit - $minprofit + $min;
            if($request->get('status')=='return'&& $order->status!='return'){
                     $order->note=$request->get('note');
                     $order->discount=$request->get('discount');
                     $order->profit-=$request->get('discount');
                     $order->save();

                $user->profit-=$request->get('discount');
                $user->save();


            }



            $user->save();

        }
          elseif($order->status=='return'&&$request->get('status')=='return'){

             $user=   $order->bill->user;
             $user->profit+=$order->discount;
             $user->profit-=$request->get('discount');
             $dis=$request->get('discount');
            $order->profit= -($dis);
             $order->note=$request->get('note');
             $user->save();






            }
            elseif($order->status =='return' && ($request->status=='wait'|| $request->status=='cancel')){

             $user=   $order->bill->user;
            $user->profit+=$order->discount;
            $order->profit=0;
             $order->note=null;
             $user->save();
             $order->save();

            }


        $order->status = $request->get('status');

        $order->profitadmin=$request->get('profitadmin');
        if ($request->name) {
            $order->name = $request->get('name');

        }
        if ($request->count) {
            $order->count = $request->get('count');

        }
        if ($request->payprice) {
            $order->payprice = $request->get('payprice');

        }
        if ($request->realprice) {
            $order->realprice = $request->get('realprice');

        }
        $order->note=$request->get('note');

        $save = $order->save();
        if ($save) {
            $bill = $order->bill;
            $total = 0;
            $real = 0;
            foreach ($bill->orders as $item) {
                if ($item->status != 'cancel' && $item->status != 'return') {

                    $real += $item->count * $item->realprice;
                    $total += $item->count * $item->payprice;
                }
            }

            $bill->total = $total;
            $bill->realprice = $real;
            $finalprofit = $total - $real;
            // $user->profit-=

            // if ($bill->orders->sum('profit') >= 0) {


                // $bill->orders->where('status','success')->count() < 1 ? $ss=0 :$ss = 30;

                //   $discount=30;
                // if(($bill->orders->where('status','wait')->count()+$bill->orders->where('status','cancel')->count())==$bill->orders->count()){
                //     $discount=0;
                // }
                   $bill->profit = $bill->orders->sum('profit') ;


            // }

            $bill->save();

            Alert::toast('تم التعديل بنجاح', 'success');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
