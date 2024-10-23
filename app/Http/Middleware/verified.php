<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class verified
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('api/users/chat/PDF')) {
            return $next($request);
        }
        
        try {
            if (!isset(auth()->user()->email_verified_at) && !auth()->user()->email_verified_at != null) {

                return $this->returnError('403', "This Account Not Verify Yet .");
            }
        } catch (\Exception $e) {
            return $this->returnError('500', "Server Error .");

        }
        return $next($request);
    }
}


