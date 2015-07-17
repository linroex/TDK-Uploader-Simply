<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '編輯任務'])

    <script>
        $(document).ready(function(){
            $("#issue-start").datepicker();
            $("#issue-end").datepicker();
        });
    </script>
</head>
<body>
    @include('components.section-header')
    @include('components.nav')

    <div class="view-container">
        <section id="content">
            <section class="page">
                <section class="panel panel-default">
                    <div class="panel-heading">
                        <strong>編輯任務</strong>
                    </div>
                    <div class="panel-body">
                        @include('components.notifier')
                        <form action="{{url('admin/issue/edit')}}" method="post" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="id" value="{{$issue->id}}">
                            <div class="form-group">
                                <label for="issue-name" class="col-sm-2">任務名稱</label>
                                <div class="col-sm-10">
                                    <input id="issue-name" name="issue-name" type="text" class="form-control" value="{{$issue->name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issue-slug" class="col-sm-2">任務代稱</label>
                                <div class="col-sm-10">
                                    <input id="issue-slug" disabled name="issue-slug" type="text" class="form-control" value="{{$issue->slug}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issue-text" class="col-sm-2">任務說明</label>
                                <div class="col-sm-10">
                                    <textarea name="issue-text" id="issue-text" rows="10" class="form-control">{{str_replace("<br />", "\n", $issue->content)}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issue-start" class="col-sm-2">開始日期</label>
                                <div class="col-sm-10">
                                    <input id="issue-start" name="issue-start" type="text" class="form-control" value="{{$issue->start_date}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issue-end" class="col-sm-2">截止日期</label>
                                <div class="col-sm-10">
                                    <input id="issue-end" name="issue-end" type="text" class="form-control" value="{{$issue->end_date}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" value="更新" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </section>
        </section>
    </div>
    {{-- View container end --}}
</body>
</html>