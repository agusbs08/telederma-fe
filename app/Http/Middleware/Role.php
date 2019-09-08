<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        if ($request->session()->get('authenticated', false) != false){
            if (!in_array(Session::get('role'), $roles)) {
                dd($roles);
                return back()->with('errors', 'Anda tidak diizinkan untuk melihat halaman tersebut!');
            }
        } else {
            return redirect()->route('auth.getLoginView')->with('errors', 'Silakan login terlebih dahulu');
        }
        return $next($request);
    }
}
