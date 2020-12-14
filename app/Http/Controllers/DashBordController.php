<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use App\Models\Paid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBordController extends Controller
{
    //
    public function admin(){

        $orders=Order::withTrashed()->get();
        $bills=Bill::withTrashed()->get();
          $paids=Paid::all();
        return view('cms.dashbord',['users'=>User::all(),'orders'=>$orders,'bills'=>$bills,'paids'=>$paids]);
    }

     public function user(){

        $bills=Auth::user()->bills()->withTrashed()->get();
        // dd(count($bills));
        return view('user.dashbord',['bills'=>$bills]);
    }
}
