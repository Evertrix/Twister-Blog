<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfPaied
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
        if (!empty(auth()->user()->stripe_id)) {
            return $next($request);
        }
        return response()->json('Your account is not paid');

    }
}
?>
