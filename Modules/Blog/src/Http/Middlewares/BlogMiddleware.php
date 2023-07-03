<?php

namespace Modules\Blog\src\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class BlogMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
