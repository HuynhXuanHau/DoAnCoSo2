<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check()) {
            return $next($request);  // Nếu đã đăng nhập, tiếp tục yêu cầu
        }

        // Nếu chưa đăng nhập, chuyển hướng đến trang login
        return redirect()->route('login'); // Đảm bảo bạn có route 'login' trong routes/web.php
    }
}
