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

	public function logout() {
		Session::flush();
		return redirect('login');
	}

	public function batchAddUser(Request $request) {

		$data = explode("\n", $request->get('data'));
		foreach($data as $row) {
			$columns = explode(",", $row);

			// $this->validate([
			// 	'email' => $columns[9],
			// 	'team_name' => $columns[1],
			// 	'leader_name' => $columns[3],
			// 	'mobile' => $columns[8],
			// 	'school' => $columns[5],
			// ], [
			// 	'email' => 'required|email|exists:users,email',
			// 	'team_name' => 'required',
			// 	'leader_name' => 'required',
			// 	'mobile' => 'required|digits:10',
			// 	'school' => 'required',
			// ]);

			User::create([
				'email' => trim($columns[9]),
				'team_id' => trim($columns[0]),
				'password' => Hash::make(strtolower(trim($columns[10]))),
				'team_name' => trim($columns[1]),
				'leader_name' => trim($columns[3]),
				'mobile' => str_replace('-', '', trim($columns[8])),
				'school' => trim($columns[5]),
				'type' => 'user'
			]);
			
			
		}

		return redirect()->back();
		
	}
}
