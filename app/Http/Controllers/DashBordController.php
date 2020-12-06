<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashBordController extends Controller
{
    //
    public function admin(){

        return view('cms.dashbord',['users'=>User::all()]);
    }

     public function user(){

        return view('user.dashbord');
    }
}
