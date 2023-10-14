<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('admin')){ // cek jika session admin ada
            return $next($request); // jika ada session admin, maka lanjut
        }

        // jika tidak ada session admin, maka kembali ke halaman login
        return redirect('login')->with('status', 'Anda harus login terlebih dahulu !');
    }
}
