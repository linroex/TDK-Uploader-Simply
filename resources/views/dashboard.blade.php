<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '總覽'])
</head>
<body>
    @include('components.section-header')
    @include('components.nav')

    <div class="view-container">
        <section id="content">
            <section class="page">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>總覽</strong>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td class="col-sm-1"></td>
                                    @foreach($issues as $issue)
                                    <td>
                                        {{$issue->name}}
                                        <br>
                                        {{$issue->end_date}}
                                    </td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->team_id}}</td>
                                    @foreach($issues as $issue)
                                    <td>
                                        應上傳：{{$issue->detail->count()}}<br>
                                        已上傳：{{array_key_exists($issue->id, $uploads[$user->team_id])?$uploads[$user->team_id][$issue->id]['count']:0}}
                                    </td>

                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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