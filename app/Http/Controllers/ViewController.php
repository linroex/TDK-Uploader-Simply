<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Session;

class ViewController extends Controller {
	public function showIndex() {
		if(Session::has('user')) {
			if(Session::get('user')->type === 'admin') {
				return view('issue.list-admin');
			}else if(Session::get('user')->type === 'user') {
				return view('issue.list-user');
			}
		}else {
			return redirect('/login');
		}
	}

	public function showLoginPage() {
		return view('Login');
	}

	public function showIssueAddAdminPage() {
		return view('issue.add');
	}

	public function showIssueListAdminPage() {
		return view('issue.list-admin');
	}

	public function showIssueDetailAdminPage() {
		return view('issue.view');
	}

	public function showIssueListUserPage() {
		return view('issue.list-user');
	}

	public function showIssueUploadUserPage() {
		return view('issue.upload');
	}

	public function showBatchAddUserPage() {
		return view('user.batch');
	}
}
