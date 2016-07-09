<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Issue;
use App\IssueDetail;
use App\Upload;

use Illuminate\Http\Request;

use DB;
use Session;
use Storage;
use Response;

class IssueController extends Controller {
    public function addIssue(Request $request) {
        $this->validate($request, [
            'issue-name' => 'required',
            'issue-slug' => 'required|unique:issues,slug',
            'issue-text' => 'required',
            'issue-start' => 'required|date',
            'issue-end' => "required|date|after:{$request->get('issue-start')}"
        ]);

        DB::transaction(function() use ($request) {
            $issue = Issue::create([
                'name' => $request->get('issue-name'),
                'slug' => $request->get('issue-slug'),
                'content' => str_replace("\n", '<br />', $request->get('issue-text')),
                'start_date' => $request->get('issue-start'),
                'end_date' => $request->get('issue-end'),
                'user_id' => Session::get('user')->id,
                'upload_count' => 0,
                'delay' => (is_null($request->get('issue-delay'))?false:true)
            ]);

            foreach ($request->get('file') as $file) {
                IssueDetail::create([
                    'issue_id' => $issue->id,
                    'desc' => $file
                ]);
            }
        });

        return redirect('admin/issue/list');
    }

    public function editIssue(Request $request) {
        $this->validate($request, [
            'issue-name' => 'required',
            'issue-text' => 'required',
            'issue-start' => 'required|date',
            'issue-end' => "required|date|after:{$request->get('issue-start')}"
        ]);

        Issue::find($request->id)->update([
            'name' => $request->get('issue-name'),
            'content' => str_replace("\n", '<br />', $request->get('issue-text')),
            'start_date' => $request->get('issue-start'),
            'end_date' => $request->get('issue-end'),
            'user_id' => Session::get('user')->id,
            'delay' => (is_null($request->get('issue-delay'))?false:true)
        ]);

        return redirect()->back()->with('message', '修改成功');
    }

    public function upload(Request $request) {
        $this->validate($request, [
            'issue_id' => 'required|exists:issues,id'
        ]);

        if(time() >= strtotime(Issue::find($request->issue_id)->start_date)) {
            if(time() <= strtotime(Issue::find($request->issue_id)->end_date) or Issue::find($request->issue_id)->delay) {
                foreach($request->file('file') as $file) {
                    if($file !== null) {
                        if($file->isValid()) {
                            $dest_path = storage_path('app/uploads/' . Session::get('user')->team_id . '/' . $request->get('issue_id'));

                            $team_id = Session::get('user')->team_id;
                            $slug = Issue::find($request->get('issue_id'))->slug;
                            $type = explode('.', $file->getClientOriginalName());
                            $type = $type[count($type)-1];
                            $number = Upload::where('issue_id', '=', $request->get('issue_id'))->count();

                            $file_name = "{$team_id}_{$slug}_{$number}.{$type}";
                            
                            $file->move($dest_path, $file_name);

                            Upload::create([
                                'user_id' => Session::get('user')->id,
                                'issue_id' => $request->get('issue_id'),
                                'path' => $dest_path . '/' . $file_name
                            ]);

                            Issue::find($request->get('issue_id'))->update([
                                'upload_count' => Upload::where('issue_id', '=', $request->get('issue_id'))->groupBy('user_id')->get()->count()
                            ]);
                        }
                    }
                }
                return redirect()->back();
            }
        }
        return abort(404);
    }

    public function delete($issue_id, $file) {
        if(Issue::find($issue_id)) {
            $file = 'uploads/' . Session::get('user')->team_id . '/' . $issue_id . '/' . $file;
            
            if(Storage::delete($file)) {
                Upload::where('path', '=', storage_path('app/' . $file))
                      ->where('user_id', '=', Session::get('user')->id)
                      ->delete();

                Issue::find($issue_id)->update([
                    'upload_count' => Upload::where('issue_id', '=', $issue_id)->groupBy('user_id')->get()->count()
                ]);

                return redirect()->back();    
            }else {
                return abort(404);
            }
            
        }else {
            return abort(404);
        }
        
    }

    public function download($file_id) {
        return Response::download(Upload::where('id', '=', $file_id)->where('user_id', '=', Session::get('user')->id)->first()->path);
    }
}
