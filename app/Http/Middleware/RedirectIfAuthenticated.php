<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next,  $guard = null)
    {
        // $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

             if ($guard == 'admin'){
            if (Auth::guard('admin')->check()){
                $user = Auth::guard('admin')->user();
                if ($user->status == "Active"){
                    return redirect()->route('admin.dashbord');
                }else{
                    // return redirect()->route('cms.author.blocked');
                }
            }
        }
        // else if ($guard == 'admin'){
        //     if (Auth::guard('admin')->check()){
        //         $user = Auth::guard('admin')->user();
        //         if ($user->status == "Active"){
        //             return redirect()->route('cms.admin.dashboard');
        //         }else{
        //             // return redirect()->route('cms.author.blocked');
        //         }
        //     }
        // }

        return $next($request);
    }
}
