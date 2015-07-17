<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '更改密碼'])
</head>
<body>
    @include('components.section-header')
    @include('components.nav')

    <div class="view-container">
        <section id="content">
            <section class="page">
                <div class="col-md-8">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>修改密碼</strong>
                            </div>
                            <div class="panel-body">
                                <form action="{{url('profile')}}" method="post" class="form-horizontal">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    
                                    <div class="form-group">
                                        <label for="old_password" class="col-md-3 control-label">舊密碼</label>
                                        <div class="col-md-9">
                                            <input type="password" id="old_password" class="form-control" name="old_password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md-3 control-label">新密碼</label>
                                        <div class="col-md-9">
                                            <input type="password" id="password" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation" class="col-md-3 control-label">在輸入一次新密碼</label>
                                        <div class="col-md-9">
                                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>

                                    <input type="submit" value="送出" class="btn btn-primary pull-right">
                                </form>
                            </div>
                            {{-- Panel body end --}}
                        </div>
                    </div>
                </div>
            </section>
            {{-- Page end --}}
        </section>
    </div>
    {{-- View container end --}}
</body>
</html>