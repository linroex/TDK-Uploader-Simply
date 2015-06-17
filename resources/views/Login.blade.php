<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '登入'])
</head>
<body class="body-special">
    <div class="view-container">
        <section id="content">
            <div class="page-signin">
                <div class="signin-header">
                    <div class="container text-center">
                        <section class="logo">
                            {{-- <a href="">TDK Uploader</a> --}}
                            <img class="col-sm-4 col-sm-offset-4" src="{{url('build/images/logo.png')}}" alt="">
                        </section>
                    </div>    
                </div>
                {{-- Signin header end --}}

                <div class="singin-body">
                    <div class="container">
                        <div class="form-container">
                            <p>本競賽主要目的在啟發大專學子對創思設計及實作興趣，進而訓練學子之創思設計及製造能力，為國家培育出具有創新想法和實作能力之人才，並加強社會及學校對創思實作之重視。</p>
                            <p>本屆競賽主題為「機器人文武雙全－科遇Book球」，比賽日期為2015年10月16至18日，比賽場地為國立臺灣科技大學體育館。競賽主題：「科」，代表科技，亦象徵本競賽歷年來由技職大專院校主辦之傳統；「Book」、「球」即文與武的意含，隱喻台灣學子以文武雙全為學習目標，同時注重專業學識與實作技能之養成。</p>
                            @include('components.notifier')
                            <form action="{{url('/login')}}" method="post" class="form-horizontal">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <fieldset>
                                    <div class="form-froup">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    {{-- Form group end --}}
                                    
                                    <br>

                                    <div class="form-froup">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-lock"></span>
                                            </span>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    {{-- Form group end --}}

                                    <div class="form-group"></div>

                                    <div class="form-froup">
                                        <input type="submit" value="登入" class="btn btn-block btn-lg btn-primary">
                                    </div>
                                    {{-- Form group end --}}
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Signin body end --}}
            </div>
        </section>
    </div>
</body>
</html>