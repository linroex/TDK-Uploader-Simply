<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '新增任務'])

    <script>
        $(document).ready(function(){
            $("#issue-start").datepicker();
            $("#issue-end").datepicker();

            $('a#file-incr').click(function() {
                uploadIncrease();
            });
            $('a#file-decr').click(function() {
                uploadDecrease();
            });
        });

        function uploadIncrease() {
            var template = $("#create_issue_form #file1").parent().parent().clone();
            var current = $('form#create_issue_form input[name="file[]"]').length + 1;
            
            template.find("label").text("檔案 " + current);
            template.find("label").attr("for", "file" + current);
            template.find("input:text").attr('id', 'file' + current);

            $('form#create_issue_form .form-group').eq(-2).after('<div class="form-group">' + template.html() + '</div>');
        }

        function uploadDecrease() {
            if($('form#create_issue_form input[name="file[]"]').length > 1){
                $('form#create_issue_form .form-group').eq(-2).remove();    
            }
            
        }

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
                        <strong>新增任務</strong>
                    </div>
                    <div class="panel-body">
                        @include('components.notifier')
                        <form action="{{url('admin/issue/add')}}" method="post" class="form-horizontal" id="create_issue_form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="issue-name" class="col-sm-2">任務名稱</label>
                                <div class="col-sm-10">
                                    <input id="issue-name" name="issue-name" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issue-slug" class="col-sm-2">任務代稱</label>
                                <div class="col-sm-10">
                                    <input id="issue-slug" name="issue-slug" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issue-text" class="col-sm-2">任務說明</label>
                                <div class="col-sm-10">
                                    <textarea name="issue-text" id="issue-text" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issue-start" class="col-sm-2">開始日期</label>
                                <div class="col-sm-10">
                                    <input id="issue-start" name="issue-start" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issue-end" class="col-sm-2">截止日期</label>
                                <div class="col-sm-10">
                                    <input id="issue-end" name="issue-end" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="issue-delay" class="col-sm-2">允許遲交</label>
                                <div class="col-sm-10">
                                     <input id="issue-delay" name="issue-delay" type="checkbox" value="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="file1" class="col-sm-2">檔案1</label>
                                <div class="col-sm-10">
                                    <input type="text" name="file[]" id="file1" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" value="新增" class="btn btn-primary">
                                </div>
                            </div>
                        </form>

                        <div class="btn-group">
                            <a id="file-incr" class="btn btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                            <a id="file-decr" class="btn btn-default"><i class="glyphicon glyphicon-minus"></i></a>
                        </div>

                    </div>
                </section>
            </section>
        </section>
    </div>
    {{-- View container end --}}
</body>
</html>