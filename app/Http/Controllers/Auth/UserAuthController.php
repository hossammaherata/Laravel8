<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Mail\AdminPasswordReset;
use App\Models\Images;
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

    // public function showForgetPassword()
    // {
    //     return view('cms.admin.auth.forgot-password');
    // }

    // public function requestNewPassword(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|exists:admins,email|email',
    //     ], ['email.exists' => 'This is email is not registered before']);

    //     $newPassword = Str::random(8);

    //     $admin = Admin::where('email', $request->get('email'))->first();
    //     $admin->password = Hash::make($newPassword);
    //     $isSaved = $admin->save();
    //     if ($isSaved) {
    //         $this->sendResetPasswordEmail($admin, $newPassword);
    //         return redirect()->route('cms.admin.login_view');
    //     } else {

    //     }
    // }

    // private function sendResetPasswordEmail(Admin $admin, $newPassword)
    // {
    //     Mail::queue(new AdminPasswordReset($admin, $newPassword));
    // }
}
