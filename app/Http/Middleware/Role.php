<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        if(!Auth::check()){
            abort(403, 'Belum Mempunyai Account');
        }
        // fungsi explode untuk mengubah string (manager, staff, admin, pelanggan) menjadi array
        $roles = explode('|', $roles);

        // array yang berisi roles di cek apakah sudah teregister atau belum
        $user = Auth::user();

        // jika sudah maka looping data arraynya
        foreach ($roles as $role) {
            // jika role termasuk ke yang dideklatasikan di route.web, maka lanjutkan
            if($user->role($role)){
                return $next($request);       
            }
        }
        return redirect('/');
    }
}
