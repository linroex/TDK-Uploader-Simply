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
                        <strong>檢視任務：測試</strong>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>任務資訊</h3>
                                <table class="table">
                                    <tr>
                                        <td>名稱</td>
                                        <td>測試</td>
                                    </tr>
                                    <tr>
                                        <td>說明</td>
                                        <td>測試測試測試測試測試測試測試測試測試測試測試測試測試測試測試</td>
                                    </tr>
                                    <tr>
                                        <td>截止日期</td>
                                        <td>2015/5/4</td>
                                    </tr>
                                    <tr>
                                        <td>已上傳使用者數</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>未上傳使用者數</td>
                                        <td>30</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        {{-- row end --}}
                        
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>上傳清單</h3>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>姓名</td>
                                            <td>最後上傳日期</td>
                                            <td>檔案數</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 0; $i <= 20; $i++)
                                        <tr>
                                            <td>林熙哲</td>
                                            <td>2015/5/2</td>
                                            <td>3</td>
                                            <td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#detail-modal">檢視</a></td>
                                        </tr>
                                        @endfor
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
                                            <td>使用者名稱</td>
                                            <td>手機</td>
                                            <td>信箱</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 0; $i <= 10; $i++)
                                        <tr>
                                            <td>林熙哲</td>
                                            <td>0912-345-678</td>
                                            <td>linroex@mail.ntust.edu.tw</td>
                                        </tr>
                                        @endfor
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