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
                @foreach($issues as $issue)
                <div class="col-sm-6">
                    <div class="panel panel-profile">
                        <div class="panel-heading text-center bg-info">
                            <i class="fa fa-upload"></i>
                            <h3>{{$issue['name']}}</h3>
                            <p>{{$issue['content']}}</p>
                        </div>

                        <div class="list-justified-container">
                            <ul class="list-justified text-center">
                                <li>
                                    <p class="size-h3">{{$issue['end_date']}}</p>
                                    <p class="text-muted">End</p>
                                </li>
                                <li>
                                    <p class="size-h3">{{$issue['count']}}</p>
                                    <p class="text-muted">Files</p>
                                </li>
                                <li>
                                    <a href="{{url('/issue/' . $issue['id'])}}" class="btn btn-lg btn-primary">詳細</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- Panel end --}}
                </div>
                @endforeach
                    
        </section>
    </div>
    {{-- View container end --}}
</body>
</html>