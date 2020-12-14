<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Dealer;
use RealRashid\SweetAlert\Facades\Alert;

class SearchController extends Controller
{

    public function SearchUser(Request $request){

        $users=User::where('name','like','%'.$request->text .'%')->orWhere('idint','like','%'.$request->text .'%')->get();
        return view('cms.users._search',['users'=>$users]);
    }

     public function BillUsers(Request $request){

        $users=User::where('name','like','%'.$request->text .'%')->orWhere('idint','like','%'.$request->text .'%')->get();
        if($request->status == 'yes'){
            return view('cms.paids._searchusers',['users'=>$users]);
        }
        return view('cms.bills._search',['users'=>$users]);
    }

       public function Bills(Request $request){


             $bills=Bill::whereHas('user',function($query) use($request){
            $query->where('name','like','%'.$request->text.'%');
             })->orWhere('name','like','%'.$request->text .'%')->orWhere('mobile','like','%'.$request->text .'%')->get();


        return view('cms.bills._index',['bills'=>$bills]);
    }
     public function dealsearch(Request $request){

        $deals=Dealer::where('name','like','%'.$request->text .'%')->orWhere('mobile','like','%'.$request->text .'%')->get();
        return view('cms.deals._search',['deals'=>$deals]);
    }


    public function userpaid(Request $request){
        $user= $this->BillUsers($request);

    }

    public function generalsearch(Request $request){

        if($request->search==null){
            //   dd(45);
            Alert::warning('لا يوجد مدخلات');
            return redirect()->route('admin.dashbord');
        }
        $users=User::where('name','like','%'.$request->search .'%')->orWhere('mobile','like','%'.$request->search .'%')->get();
          return view('cms.users.index',['users'=>$users]);

    }



}
