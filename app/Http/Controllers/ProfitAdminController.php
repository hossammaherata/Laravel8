<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfitAdminController extends Controller
{

    public function adminProfit(Request $request){


        $users=User::with(['bills'=>function($query) use ($request){


        $from=Carbon::create($request->get('from'));
        $to=Carbon::create($request->to);
        $query->where('created_at','>=',$from)->where('created_at','<=',$to)->withTrashed();

        }])->withTrashed()->get();
         $from=Carbon::create($request->get('from'));
        $to=Carbon::create($request->to);
        $orders=Order::where('created_at','>=',$from)->where('created_at','<=',$to)->where('status','success')->withTrashed()->get();
        // $userss=User::with('orders')->where('created')
        return view('cms.profit.admin',['users'=>$users,'orders'=>$orders]);

        dd($users);

    }
}
