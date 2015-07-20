<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Issue;
use App\Upload;
use App\User;

use Illuminate\Http\Request;

use Session;
use DB;

class ViewController extends Controller {
    public function showIndex() {
        if(Session::has('user')) {
            if(Session::get('user')->type === 'admin') {
                return $this->showAdminDashboard();
            }else if(Session::get('user')->type === 'user') {
                return $this->showIssueListUserPage();
            }
        }else {
            return redirect('/login');
        }
    }

    public function showAdminDashboard() {
        $users = User::where('type', '=', 'user')->get();
        $issues = Issue::all();
        $uploads_count = [];

        foreach($users as $user) {
            $uploads_count[$user->team_id] = Upload::where('user_id', '=', $user->id)->groupBy('issue_id')->get()->keyBy('issue_id')->toArray();
        }
        
        return view('dashboard')->with([
            'users' => $users,
            'issues' => $issues,
            'uploads' => $uploads_count
        ]);
    }

    public function showLoginPage() {
        return view('Login');
    }

    public function showIssueAddAdminPage() {
        return view('issue.add');
    }

    public function showIssueListAdminPage() {
        return view('issue.list-admin')->with([
            'issues' => Issue::all()
        ]);
    }

    public function showIssueDetailAdminPage($id) {

        $uploads = Upload::where('issue_id', '=', $id)->groupBy('user_id')->get();
        $upload_user = $uploads->keyBy('user_id');
        $user = User::all();

        $not_upload = $user->filter(function($item) use($upload_user) {
            if(!$upload_user->has($item->id)) {
                return $item;
            }
        });

        return view('issue.view')->with([
            'issue' => Issue::find($id),
            'uploads' => $uploads,
            'not_upload' => $not_upload

        ]);
    }

    public function showIssueListUserPage() {
        $issues = Issue::all()->toArray();

        $i = 0;
        for($i = 0; $i < count($issues); $i++) {
            $issues[$i]['count'] = Upload::where('issue_id', '=', $issues[$i]['id'])->where('user_id', '=', Session::get('user')->id)->count();
        }
        
        return view('issue.list-user')->with([
            'issues' => $issues
        ]);
    }

    public function showIssueUploadUserPage($id) {
        if(time() >= strtotime(Issue::find($id)->start_date)) {
            if(time() <= strtotime(Issue::find($id)->end_date) or Issue::find($id)->delay) {
                return view('issue.upload')->with([
                    'issue' => Issue::find($id),
                    'uploads' => Upload::where('user_id', '=', Session::get('user')->id)->where('issue_id', '=', $id)->get(),
                ]);
            }
        }

        return abort(404);
    }

    public function showBatchAddUserPage() {
        return view('user.batch');
    }

    public function showProfilePage() {
        return view('user.profile');
    }

    public function showEditIssuePage($id) {
        return view('issue.edit')->with([
            'issue' => Issue::find($id)
        ]);
    }
}
