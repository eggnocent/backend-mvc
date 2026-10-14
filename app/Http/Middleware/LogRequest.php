<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::info('Request masuk: ' . $request->method() . ' ' . $request->path());

        $response = $next($request);

        \Log::info('Response keluar dengan status: ' . $response->status());

        return $response;
    }
}
