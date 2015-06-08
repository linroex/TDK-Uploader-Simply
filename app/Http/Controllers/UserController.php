<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

use Hash;
use Session;

class UserController extends Controller {
	public function login(Request $request) {
		$this->validate($request, [
			'email' => 'required|email|exists:users,email',
			'password' => 'required'
		]);

		$user = User::where('email', '=', $request->get('email'))->first();

		if(Hash::check($request->get('password'), $user->password)) {
			Session::put('user', $user);
			return redirect('/');
		}else {
			return redirect('/login')->withErrors('Password is wrong');
		}
	}
}
