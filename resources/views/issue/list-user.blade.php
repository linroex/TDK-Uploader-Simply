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
                <div class="row">
                    

                    <div class="col-sm-6">
                        <h3>隊伍資料</h3>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="col-sm-2">參賽組別</td>
                                    <td>{{substr(Session::get('user')->team_id, 0, 1) == 'A'?'自動組':'遙控組'}}</td>
                                </tr>
                                <tr>
                                    <td>參賽學校</td>
                                    <td>{{Session::get('user')->school}}</td>
                                </tr>
                                <tr>
                                    <td>隊伍編號</td>
                                    <td>{{Session::get('user')->team_id}}</td>
                                </tr>
                                <tr>
                                    <td>隊伍名稱</td>
                                    <td>{{Session::get('user')->team_name}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- col-sm-6 end --}}
                </div>
                {{-- row end --}}

                <div class="row">
                    @foreach($issues as $issue)
                        
                        @if(time() >= strtotime($issue['start_date']))

                            @if(time() <= strtotime($issue['end_date']) or $issue['delay'])
                            <div class="col-sm-6">
                                <div class="panel panel-profile">
                                    <div class="panel-heading text-center bg-info">
                                        <i class="fa fa-upload"></i>
                                        <h3>{{$issue['name']}}</h3>
                                        <p>{!!$issue['content']!!}</p>
                                    </div>

                                    <div class="list-justified-container">
                                        <ul class="list-justified text-center">
                                            <li>
                                                <p class="size-h3">{{$issue['end_date']}}</p>
                                                <p class="text-muted">截止日期</p>
                                            </li>
                                            <li>
                                                <p class="size-h3">{{$issue['count']}}</p>
                                                <p class="text-muted">已上傳檔案數</p>
                                            </li>
                                            <li>
                                                <a href="{{url('/issue/' . $issue['id'])}}" class="btn btn-lg btn-primary">詳細</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- Panel end --}}
                            </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                    
        </section>
    </div>
    {{-- View container end --}}
</body>
</html>