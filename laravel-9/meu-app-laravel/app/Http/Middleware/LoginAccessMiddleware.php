<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LoginAccess;

class LoginAccessMiddleware
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
        // return $next($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();
        LoginAccess::create(['log' => "$ip requisitou a rota $route"]);
        return Response('chegamos no middleware');
        // return $next($request);
    }
}
