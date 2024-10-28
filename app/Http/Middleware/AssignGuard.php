<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class AssignGuard extends BaseMiddleware
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        if ($guard != null) {
            auth()->shouldUse($guard); //?shoud you user guard / table
            // $token = $request->token;
            $token = $request->header('Authorization');
            if ($request->is('api/users/chat/PDF')) {
                try {
                    if ($token) {
                        $request->headers->set('Authorization', 'Bearer ' . $token, true);
                        JWTAuth::parseToken()->authenticate();
                    }
                } catch (TokenExpiredException $e) {
                    return $next($request);
                } catch (JWTException $e) {
                    return $next($request);
                }

                // Allow the request to continue to the controller even if not authenticated
                return $next($request);
            }
            // $token = $request->header('auth-token');
            $request->headers->set('token', (string) $token, true);
            $request->headers->set('Authorization', 'Bearer ' . $token, true);
            try {
                //$user = $this->auth->authenticate($request);  //check authenticted user
                JWTAuth::parseToken()->authenticate();
            } catch (TokenExpiredException $e) {
                return $this->returnError('401', 'Unauthenticated user' . $e->getMessage());
            } catch (JWTException $e) {

                return $this->returnError('401', 'token_invalid ' . $e->getMessage());
            }

        }
        return $next($request);
    }
}
