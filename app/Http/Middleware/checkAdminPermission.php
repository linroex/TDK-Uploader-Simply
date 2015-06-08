<?php namespace App\Http\Middleware;

use Closure;
use Session;

class checkAdminPermission {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Session::has('user')) {
			if(Session::get('user')->type === 'admin') {
				return $next($request);
			}else {
				return abort(404);
			}
		}else {
			return redirect('login');
		}
		
	}

}
