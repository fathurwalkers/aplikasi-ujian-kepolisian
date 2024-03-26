<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CekLoginClient
{
    public function handle(Request $request, Closure $next)
    {
        $cek_users = session('data_login');
        if ($cek_users == null) {
            return redirect()->route('login-client')->with('status', 'Silahkan login terlebih dahulu!');
        }
        if ($cek_users->login_level == "admin") {
            return redirect()->route('dashboard')->with('status', 'Maaf, anda sedang login sebagai administrator. tidak dapat mengakses halaman client');
        } elseif ($cek_users->login_level == "user") {
            View::share('users', $cek_users);
            return $next($request);
        } else {
            return redirect()->route('login-client')->with('status', 'Silahkan login terlebih dahulu!');
        }
    }
}
