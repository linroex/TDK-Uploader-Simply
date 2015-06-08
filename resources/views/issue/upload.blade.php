<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '上傳檔案'])
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

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table">
                                        <tbody>
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
                                                <td>2015/6/5</td>
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
                                            <tr>
                                                <td>123.zip</td>
                                                <td>2015/6/2</td>
                                                <td>21:39</td>
                                                <td><a href="" class="btn btn-danger">刪除</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- Row end --}}
                        </div>
                        {{-- col-sm-6 end --}}

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="drop-box">Drag and drop files here</div>
                                </div>
                            </div>
                            {{-- row end --}}

                            <br>

                            <div class="row">
                                <div class="col-sm-12">
                                    @for($i = 0; $i <= 1; $i++)
                                    <div class="alert alert-success">
                                        <span>a.pdf</span>
                                        <div class="pull-right">
                                            <a href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                            {{-- row end --}}

                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="" class="btn btn-primary btn-block btn-lg">儲存</a>
                                </div>
                            </div>
                            {{-- row end --}}
                        </div>
                        {{-- col-sm-6 end --}}
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