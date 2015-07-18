<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '上傳檔案'])
    <script>
    function openFileDialog(target) {
        $(target).click();
    }

    function uploadIncrease() {
        var template = $("#upload-item-template table tbody");
        var current = $('form#upload-form tr input:file').length + 1;
        $(template).find("td").eq(0).text("檔案 " + current);
        $(template).find("a.btn.btn-success").attr('onclick', 'openFileDialog("#file' + current + '")');
        $(template).find("input:file").attr('id', 'file' + current);

        $('form#upload-form tr').eq(-2).after($(template).html());
    }

    function uploadDecrease() {
        $('form#upload-form tr').eq(-2).remove()
    }

    $(document).ready(function() {
        $("form#upload-form").on("change", "input:file", function() {
            $(this).parent().children(".input-group").children("input:text").val($(this).val());
        })

        $('a#upload-incr').click(function() {
            uploadIncrease();
        });
        $('a#upload-decr').click(function() {
            uploadDecrease();
        });
    });
    </script>
</head>
<body>
    @include('components.section-header')
    @include('components.nav')

    <div class="view-container">
        <section id="content">
            <section class="page">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>上傳檔案</strong>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-8">
                            <h3>上傳任務說明</h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-sm-2">任務名稱</td>
                                                <td>{{$issue->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>任務說明</td>
                                                <td>{!!$issue->content!!}</td>
                                            </tr>
                                            <tr>
                                                <td>截止日期</td>
                                                <td>{{$issue->end_date}}</td>
                                            </tr>
                                            <tr>
                                                <td>預計檔案數</td>
                                                <td>{{$issue->estimate_upload_num}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- col-sm-6 end --}}
                            </div>
                            {{-- Row end --}}

                            <h3>隊伍資料</h3>

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-sm-2">參賽組別</td>
                                                <td>{{substr(Session::get('user')->team_id, 0, 1) == 'A'?'自動組':'遙控組'}}</td>
                                            </tr>
                                            <tr>
                                                <td>參賽學校</td>
                                                <td>{{Session::get('user')->school}}</td>
                                            </tr>
                                            <tr>
                                                <td>隊伍編號</td>
                                                <td>{{Session::get('user')->team_id}}</td>
                                            </tr>
                                            <tr>
                                                <td>隊伍名稱</td>
                                                <td>{{Session::get('user')->team_name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- col-sm-6 end --}}
                            </div>
                            {{-- Row end --}}
                            
                            <h3>上傳清單</h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table">
                                        <tbody>
                                            @foreach($uploads as $upload)
                                            <tr>
                                                <td><a href="{{url('file/' . $upload->id)}}">{{basename($upload->path)}}</a></td>
                                                <td>{{$upload->updated_at}}</td>
                                                <td><a href="{{url('/issue/' . $issue->id .'/' . basename($upload->path) . '/delete')}}" class="btn btn-danger">刪除</a></td>
                                                {{-- <td><a href="{{url($upload->path)}}" class="btn btn-default">檢視</a></td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- Row end --}}
                            <h3>上傳檔案</h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-info">
                                        <h3>說明</h3>
                                        <ol>
                                            <li>如果要更新檔案，請先刪除原檔案，再上傳新檔案。</li>
                                        </ol>
                                    </div>
                                    @include('components.notifier')
                                    <form id="upload-form" action="{{url('issue/' . $issue->id . '/upload')}}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="issue_id" value="{{$issue->id}}">
                                        <table class="table">
                                            <tr>
                                                <td class="col-sm-2">檔案 1</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-btn">
                                                            <a class="btn btn-success" onclick="openFileDialog('#file1')">選擇</a>
                                                        </span>

                                                    </div>
                                                    <input type="file" name="file[]" id="file1" class="hidden">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>檔案 2</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-btn">
                                                            <a class="btn btn-success" onclick="openFileDialog('#file2')">選擇</a>
                                                        </span>
                                                    </div>
                                                    <input type="file" name="file[]" id="file2" class="hidden">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>檔案 3</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <span class="input-group-btn">
                                                            <a class="btn btn-success" onclick="openFileDialog('#file3')">選擇</a>
                                                        </span>
                                                    </div>
                                                    <input type="file" name="file[]" id="file3" class="hidden">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" class="col-md-12">
                                                    <div class="btn-group">
                                                        <a id="upload-incr" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                                                        <a id="upload-decr" class="btn btn-default"><i class="glyphicon glyphicon-minus"></i></a>
                                                    </div>

                                                    <input type="submit" value="上傳" class="btn btn-primary pull-right">
                                                </td>
                                                
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            {{-- Row end --}}
                        </div>
                        {{-- col-sm-8 end --}}

                        
                    </div>
                    {{-- Panel body end --}}
                </div>
            </section>
            {{-- Page end --}}
        </section>
    </div>
    {{-- View container end --}}
    <div class="hidden" id="upload-item-template">
        <table>
            <tbody>
                <tr>
                    <td></td>
                    <td>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <a class="btn btn-success" onclick="openFileDialog('#')">選擇</a>
                            </span>
                        </div>
                        <input type="file" name="file[]" class="hidden">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>  
    
</body>
</html>