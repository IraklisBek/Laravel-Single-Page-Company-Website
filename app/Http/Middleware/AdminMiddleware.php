<?php

namespace App\Http\Middleware;

use App\Acme\Services\MessageService;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->isAdminTesting()) {
            //MessageService::_message('success', 'Welcome Mr. Admin');
            return $next($request);
        }

        MessageService::_message('fail', 'You need Administration Access to view '. str_replace(constant('myurl'), '', \Request::url()));

        return redirect()->route('admin.pages.login');
    }
}
