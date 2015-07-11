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
                return view('issue.list-admin')->with(['issues' => Issue::all()]);
            }else if(Session::get('user')->type === 'user') {
                return $this->showIssueListUserPage();
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
        $count = Upload::where('user_id', '=', Session::get('user')->id)->groupBy('issue_id')->get(array('issue_id', DB::raw('count(*) as count')))->toArray();
        $issues = Issue::all()->toArray();

        // dd($count);

        $i = 0;
        for($i = 0; $i < count($issues); $i++) {
            if(count($count) <= $i) {
                $issues[$i]['count'] = 0;
            }else {
                $issues[$i]['count'] = $count[$i]['count'];    
            }
        }

        // dd($issues);

        return view('issue.list-user')->with([
            'issues' => $issues
        ]);
    }

    public function showIssueUploadUserPage($id) {
        return view('issue.upload')->with([
            'issue' => Issue::find($id),
            'uploads' => Upload::where('user_id', '=', Session::get('user')->id)->where('issue_id', '=', $id)->get(),
        ]);
    }

    public function showBatchAddUserPage() {
        return view('user.batch');
    }
}
