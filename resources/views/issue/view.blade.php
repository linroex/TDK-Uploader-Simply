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
                        <strong>檢視任務：{{$issue->name}}</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-8">
                                <h3>任務資訊</h3>
                                <table class="table">
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
                                        <td>已上傳使用者數</td>
                                        <td>{{$issue->upload_count}}</td>
                                    </tr>
                                    <tr>
                                        <td>未上傳使用者數</td>
                                        <td>{{$not_upload->count()}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        {{-- row end --}}
                        
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>已上傳清單</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>隊伍編號</td>
                                            <td>姓名</td>
                                            <td>手機</td>
                                            <td>信箱</td>
                                            <td>最後上傳</td>
                                            <td>檔案數</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($uploads as $upload)
                                        <tr>
                                            <td>{{$upload->user->team_id}}</td>
                                            <td>{{$upload->user->leader_name}}</td>
                                            <td>{{$upload->user->mobile}}</td>
                                            <td>{{$upload->user->email}}</td>
                                            <td>{{$upload->updated_at}}</td>
                                            <td>{{$upload->count}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- cols-sm-12 end --}}
                        </div>
                        {{-- row end --}}

                        <div class="row">
                            <div class="col-sm-12">
                                <h3>未上傳清單</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>隊伍編號</td>
                                            <td>姓名</td>
                                            <td>手機</td>
                                            <td>信箱</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($not_upload as $item)
                                        <tr>
                                            <td>{{$item->team_id}}</td>
                                            <td>{{$item->leader_name}}</td>
                                            <td>{{$item->mobile}}</td>
                                            <td>{{$item->email}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- row end --}}
                    </div>
                    {{-- Panel body end --}}
                </div>
            </section>
            {{-- Page end --}}
        </section>
    </div>
    {{-- View container end --}}

    <div class="modal fade" id="detail-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">上傳檔案</h4>
          </div>
          <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>
                        <td>檔案名稱</td>
                        <td>上傳日期</td>
                        <td>上傳時間</td>
                        <td>下載</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ABCD.pdf</td>
                        <td>2015/5/2</td>
                        <td>21:35</td>
                        <td><a href="" class="btn btn-success">下載</a></td>
                    </tr>
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">關閉</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
</html>