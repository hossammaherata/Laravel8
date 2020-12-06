<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Twit;
use Illuminate\Http\Request;

class UserAccessController extends Controller
{
    //
    public function twit(){


        return view('user.twit',['twits'=>Twit::all()]);
    }
      public function contact(){

        $contact=Contact::first();
        return view('user.contact',['contact'=>$contact]);

    }
}
