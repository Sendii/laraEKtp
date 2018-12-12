<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Authentication;
use Auth;

class Admin
{
    protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    protected function authenticate(array $guards)
    {
        if (empty($guards)) {
            return $this->auth->authenticate();
        }
        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }
        throw new AuthenticationException('Unauthenticated.', $guards);
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($guards);
        if (Auth::user() &&  Auth::user()->akses == 'admin') {
            return $next($request);
        }else{
            return back();
        }
        return redirect('/');
    }
}
