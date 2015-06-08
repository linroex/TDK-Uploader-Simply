<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '批次新增用戶'])
</head>
<body>
    @include('components.section-header')
    @include('components.nav')

    <div class="view-container">
        <section id="content">
            <section class="page">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>批次新增用戶</strong>
                    </div>
                    <div class="panel-body">
                        <form action="{{}}" method="post">
                            <div class="form-group">
                                <textarea name="data" class="form-control" rows="20"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="送出" class="btn btn-primary">
                            </div>
                        </form>
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