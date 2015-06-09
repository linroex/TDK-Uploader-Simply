<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '上傳檔案'])
    <script>
    function openFileDialog(target) {
        $(target).click();
    }

    $(document).ready(function() {
        $('input:file').change(function(){
            $(this).parent().children(".input-group").children("input:text").val($(this).val());
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
                        <h3>基本資訊</h3>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-sm-2">名稱</td>
                                                <td>{{$issue->name}}</td>
                                            </tr>
                                            <tr>
                                                <td>說明</td>
                                                <td>{{$issue->content}}</td>
                                            </tr>
                                            <tr>
                                                <td>截止日期</td>
                                                <td>{{$issue->end_date}}</td>
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
                                                <td>{{explode("-time-", basename($upload->path))[1]}}</td>
                                                <td>{{$upload->updated_at}}</td>
                                                <td><a href="{{url('/issue/' . $issue->id .'/' . basename($upload->path) . '/delete')}}" class="btn btn-danger">刪除</a></td>
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
                                    @include('components.notifier')
                                    <form action="{{url('issue/' . $issue->id . '/upload')}}" method="post" enctype="multipart/form-data">
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
                                                <td></td>
                                                <td><input type="submit" value="上傳" class="btn btn-primary pull-right"></td>
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
</body>
</html>