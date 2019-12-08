<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class check_login 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::get("logged_in")== false) {
            return redirect("login");
            // jika variabel Logged_in bernilai false,maka belum melakukan login
            // dan diarahkan ke halaman Login
        }
        return $next($request);
    }
}
?>