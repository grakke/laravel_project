<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
//	    if ($request->age <= 200) {
//		    echo "lighter 200 <br>";
//	    }
//
//	    return $next($request);

	    $response = $next($request);

	    if ($request->age <= 100) {
		    echo "lighter 100 <br>";
//		    return redirect('home');
	    }

	    return $response;
    }

	public function terminate($request, $response)
	{
		echo "terminate";
	}
}
