<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Issue;

use Session;

class IssueController extends Controller {
	public function addIssue(Request $request) {
		$this->validate($request, [
			'issue-name' => 'required',
			'issue-text' => 'required',
			'issue-start' => 'required|date',
			'issue-end' => "required|date|after:{$request->get('issue-start')}"
		]);

		Issue::create([
			'name' => $request->get('issue-name'),
			'content' => $request->get('issue-text'),
			'start_date' => $request->get('issue-start'),
			'end_date' => $request->get('issue-end'),
			'user_id' => Session::get('user')->id,
			'upload_count' => 0
		]);

		return redirect('/admin/issue/list');
	}
}
