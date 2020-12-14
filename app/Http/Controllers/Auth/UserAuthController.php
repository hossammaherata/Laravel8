<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Mail\AdminPasswordReset;
use App\Mail\UserPasswordReset;
use App\Models\Images;
use App\Models\User;
use App\Student;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    //
    // use AuthenticatesUsers;

    // protected $guardName = 'admin';
    // protected $maxAttempts = 4;
    // protected $decayMinutes = 2;

    public function __construct()
    {

        $this->middleware('guest:user')->except('logout');
        // $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginView(){
        $image=Images::first();
        return view('cms.auth.user.login',['image'=>$image]);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email|string|exists:users,email',
            'password'=>'required|string|min:3',
            'remember_me'=>'string|in:on'
        ],[
            'email.required'=>'الإيميل فارغ',
            'email.email'=>'الرجاء التحقق من الإيميل',
            'email.exists'=>'الرجاء التأكد من البيانات المدخلة ',
            'password.required'=>'كلمة السر فارغة',
            'password.min'=>'كلمة السر يجب أن تكون أكثر من 3 ارقام'
        ]);
            // dd(45);


        $rememberMe = $request->remember_me == 'on' ? true : false;

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::guard('user')->attempt($credentials, $rememberMe)){

            $user = Auth::guard('user')->user();

            if ($user->status == "Active"){

                return redirect()->route('user.dashbord');
            }elseif($user->status == "Blocked"){
                //  dd(54);
                Auth::guard('user')->logout();
                return redirect()->guest(route('user.blocked'));
            }
            else{
                   Auth::guard('user')->logout();
                return redirect()->guest(route('user.wait'));
            }
        }else{

            return redirect()->back()->withErrors('error','الرجاء التأكد من البيانات المدخلة') ->withInput();
        }
    }
    public function blocked(){

        return view('cms.auth.user.blocked');
    }
     public function wait(){

        return view('cms.auth.user.wait');
    }

    // public function showResetPasswordView(){
    //     return view('cms.admin.settings.reset_password');
    // }

    // public function resetPassword(Request $request)
    // {
    //     $request->validate([
    //         'current_password' => 'required|string|password:admin',
    //         'new_password' => 'required|string',
    //         'new_password_confirmation' => 'required|string|same:new_password'
    //     ],['current_password.password'=>'Your current password is not correct']);

    //     $user = Auth::user();
    //     $user->password = Hash::make($request->get('new_password'));
    //     $isSaved = $user->save();
    //     if ($isSaved) {
    //         return response()->json(['icon' => 'success', 'title' => 'Password changed successfully'], 200);
    //     } else {
    //         return response()->json(['icon' => 'success', 'title' => 'Password change failed!'], 400);
    //     }
    // }

    public function logout(Request $request){
        // dd(45);
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('user.login.view'));
    }

    public function showForgetPassword()
    {
        // dd(45);
        return view('cms.auth.user.forgot-password');
    }

    public function requestNewPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email|email',
        ], ['email.exists' => 'ألرجاء التأكد من الإيميل']);

        $newPassword = Str::random(8);

        $user = User::where('email', $request->get('email'))->first();
        $user->password = Hash::make($newPassword);
        $user->viewPassword=$newPassword;
        $isSaved = $user->save();
        if ($isSaved) {
            $this->sendResetPasswordEmail($user, $newPassword);
            return redirect()->route('user.login.view');
        } else {

        }
    }

    private function sendResetPasswordEmail(User $user, $newPassword)
    {
        Mail::queue(new UserPasswordReset($user, $newPassword));
    }
}
