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
                                        <td>名稱</td>
                                        <td>介紹</td>
                                        <td>開始日期</td>
                                        <td>截止日期</td>
                                        <td>上傳人數</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i <= 10; $i++)
                                    <tr>
                                        <td class="hidden"><input type="hidden" name="id" value="{{$i}}"></td>
                                        <td>測試</td>
                                        <td class="hidden-sm">測試測試測試測試測試測試測試測試測試測試測試測試測試測試測試</td>
                                        <td>2015/5/1</td>
                                        <td>2015/5/3</td>
                                        <td>10</td>
                                        <td class="text-center"><a href="{{url('/admin/issue/' . $i)}}" class="btn btn-primary">檢視</a></td>
                                    </tr>
                                    @endfor
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