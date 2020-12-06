<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
         if ($this->auth->guard('admin')) {

            $loginRoute = "admin.login.view";
            return route($loginRoute);

        }
        // else if($this->auth->guard('user')){
        //     $loginRoute = "user.login.view";
        //     return route($loginRoute);
        // }
    }
}
