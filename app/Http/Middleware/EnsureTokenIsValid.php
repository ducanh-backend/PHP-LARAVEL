<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // nếu người dùng chưa đăng nhập thì sẽ đẩy về
        // dùng Auth::user() để kiểm t ra user
        if(!Auth::user()){
            return redirect('/');
        }
        return $next($request); // cho request đi tiếp đến côntroller
    }
}
