<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ViewController extends Controller {
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
}
