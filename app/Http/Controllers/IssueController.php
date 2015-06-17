<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Issue;
use App\Upload;

use Illuminate\Http\Request;

use Session;
use Storage;

class IssueController extends Controller {
    public function addIssue(Request $request) {
        $this->validate($request, [
            'issue-name' => 'required',
            'issue-slug' => 'required',
            'issue-text' => 'required',
            'issue-start' => 'required|date',
            'issue-end' => "required|date|after:{$request->get('issue-start')}"
        ]);

        Issue::create([
            'name' => $request->get('issue-name'),
            'slug' => str_replace(' ', '-', $request->get('issue-slug')),
            'content' => $request->get('issue-text'),
            'start_date' => $request->get('issue-start'),
            'end_date' => $request->get('issue-end'),
            'user_id' => Session::get('user')->id,
            'upload_count' => 0
        ]);

        return redirect('/admin/issue/list');
    }

    public function upload(Request $request) {
        $this->validate($request, [
            'issue_id' => 'required|exists:issues,id'
        ]);

        foreach($request->file('file') as $file) {
            if($file !== null) {
                if($file->isValid()) {
                    $dest_path = storage_path('app/uploads/' . Session::get('user')->team_id . '/' . $request->get('issue_id'));
                    $file_name = time() . '-time-' . $file->getClientOriginalName();
                    $file->move($dest_path, $file_name);

                    Upload::create([
                        'user_id' => Session::get('user')->id,
                        'issue_id' => $request->get('issue_id'),
                        'path' => $dest_path . '/' . $file_name
                    ]);

                    Issue::find($request->get('issue_id'))->update([
                        'upload_count' => Upload::where('user_id', '=', Session::get('user')->id)->count()
                    ]);
                }
            }
        }   
        
        return redirect()->back();
    }

    public function delete($issue_id, $file) {
        if(Issue::find($issue_id)) {
            $file = 'uploads/' . Session::get('user')->team_id . '/' . $issue_id . '/' . $file;
            
            Storage::delete($file);
            
            Upload::where('path', '=', storage_path('app/' . $file))
                  ->where('user_id', '=', Session::get('user')->id)
                  ->delete();

            Issue::find($issue_id)->update([
                'upload_count' => Upload::where('user_id', '=', Session::get('user')->id)->count()
            ]);

            return redirect()->back();    
        }else {
            return abort(404);
        }
        
    }
}
