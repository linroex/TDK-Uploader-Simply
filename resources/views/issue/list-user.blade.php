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
                
                @for($i = 0; $i <= 5; $i++)
                <div class="col-sm-6">
                    <div class="panel panel-profile">
                        <div class="panel-heading text-center bg-info">
                            <i class="fa fa-upload"></i>
                            <h3>測試</h3>
                            <p>測試測試測試測試測試測試測試測試測試測試測試測試測試測試測試</p>
                        </div>

                        <div class="list-justified-container">
                            <ul class="list-justified text-center">
                                <li>
                                    <p class="size-h3">2015/5/3</p>
                                    <p class="text-muted">End</p>
                                </li>
                                <li>
                                    <p class="size-h3">5</p>
                                    <p class="text-muted">Files</p>
                                </li>
                                <li>
                                    <a href="" class="btn btn-lg btn-primary">檢視</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- Panel end --}}
                </div>
                @endfor
                    
        </section>
    </div>
    {{-- View container end --}}
</body>
</html>