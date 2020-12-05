<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Event;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class TruchController extends Controller
{
    public function index(){
        $bills=Bill::with(['user'=>function($query){
            $query->withTrashed();
        }])->onlyTrashed()->get();
         $users=User::onlyTrashed()->get();
         $events=Event::onlyTrashed()->get();
        return view('cms.trush.index',['bills'=>$bills,'users'=>$users,'events'=>$events]);
    }

      public function restore($id){



       $bill= Bill::withTrashed()->find($id)->restore();
       $orders=  Order::onlyTrashed()->where('bill_id',$id)->restore();


    return response()->json(['icon'=>'success','title'=>'تمت الإستعادة بنجاح  '],200);


    }

     public function userRestore($id){


    $user=    User::withTrashed()->find($id)->restore();
    // $user=User::find($id);
     Bill::withTrashed()->where('user_id',$id)->restore();

     $user=User::find($id);


    foreach($user->bills as $item){
            $order=Order::withTrashed()->where('bill_id',$item->id)->restore();

    }


    return response()->json(['icon'=>'success','title'=>'تمت الإستعادة بنجاح  '],200);


    }
     public function eventRestore($id){


    $user=    Event::withTrashed()->find($id)->restore();
    // $user=User::find($id);
    //  Bill::withTrashed()->where('user_id',$id)->restore();

     $user=User::find($id);


    // foreach($user->bills as $item){
    //         $order=Order::withTrashed()->where('bill_id',$item->id)->restore();

    // }


    return response()->json(['icon'=>'success','title'=>'تمت الإستعادة بنجاح  '],200);


    }

}
