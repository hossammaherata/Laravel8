<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    //
    public function billindex(Request $request){
        $from=Carbon::create($request->get('from'));
        $to=Carbon::create($request->to);
        // dd($to);
        $bills=Bill::with(['user'=>function($query){
            $query->withTrashed();
        }])->with(['orders'=>function($query){
            $query->withTrashed();
        }])->orderBy('created_at', 'DESC')->withTrashed()->get();
               $frombill=$bills->where('created_at','>=',$from);
            //    dd($frombill->count());
          $bills=$frombill->where('created_at','<=',$to);

          return view('cms.bills.index',['bills'=>$bills,'search'=>'no','from'=>$from,'to'=>$to]);


    }

    public function databill(Request $request){
     $object=   $this->billindex($request);
       $bills=$object->bills;
       return view('cms.reports.bills',['bills'=>$bills,'data'=>'yes','from'=>$request->get('from'),'to'=>$request->get('to')]);

    }

      public function indexbill(){

        $bills=Bill::with('user','orders')->orderBy('created_at', 'DESC')->get();

       return view('cms.reports.bills',['bills'=>$bills,'data'=>'no']);

    }




}
