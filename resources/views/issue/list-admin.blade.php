<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '檢視任務'])
</head>
<body>
    @include('components.section-header')
    @include('components.nav')

    <div class="view-container">
        <section id="content">
            <section class="page">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>檢視任務</strong>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table-striped table">
                                <thead>
                                    <tr>
                                        <td class="hidden"></td>   
                                        <td class="col-sm-2">任務名稱</td>
                                        <td class="col-sm-4">任務介紹</td>
                                        <td class="col-sm-1">開始日期</td>
                                        <td class="col-sm-1">截止日期</td>
                                        <td class="col-sm-1">上傳人數</td>
                                        <td class="col-sm-1"></td>
                                        <td class="col-sm-1"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($issues as $issue)
                                    <tr>
                                        <td class="hidden"><input type="hidden" name="id" value="{{$issue->id}}"></td>
                                        <td>{{$issue->name}}</td>
                                        <td class="hidden-sm">{!!$issue->content!!}</td>
                                        <td>{{$issue->start_date}}</td>
                                        <td>{{$issue->end_date}}</td>
                                        <td>{{$issue->upload_count}}</td>
                                        <td class="text-center"><a href="{{url('/admin/issue/' . $issue->id)}}" class="btn btn-primary">檢視</a></td>
                                        <td class="text-center"><a href="{{url('/admin/issue/edit/' . $issue->id)}}" class="btn btn-default">編輯</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
    {{-- View container end --}}
</body>
</html>