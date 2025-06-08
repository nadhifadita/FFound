<?php

use Illuminate\Support\Facades\Auth;

if (Auth::check() && Auth::user()->is_admin) {
    // Jika user login DAN is_admin-nya true, lanjutkan ke rute
    return $next($request);
}
// Jika tidak, tolak akses (misalnya, tampilkan 403 Forbidden)
return abort(403, 'Unauthorized access.');