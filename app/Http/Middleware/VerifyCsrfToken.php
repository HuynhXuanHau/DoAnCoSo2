<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // Đưa các URL bạn muốn bỏ qua việc kiểm tra CSRF vào đây
        '/api/*',  // Ví dụ, bỏ qua các API route
    ];
}
