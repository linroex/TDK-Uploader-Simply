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
                            <p>請輸入帳號密碼登入頁面上傳檔案，本站提供給每組參賽隊伍一組帳號與密碼，預設帳號為隊伍資料表中「隊員一」之Email帳號，預設密碼為「隊員一」之身分證字號（英文字母為小寫）。</p>

                            <p>預設帳號查詢（<a href="http://tdk.ntust.edu.tw/wp-content/uploads/2015/01/資料上傳平台 預設帳號名冊.pdf" target="_blank">http://tdk.ntust.edu.tw/wp-content/uploads/2015/01/資料上傳平台 預設帳號名冊.pdf</a>）</p>

                            <p>使用平台如有任何問題，請洽台科大TDK辦公室莊喻淇助理。</p>
                            <ul>
                                <li>02-27376906</li>
                                <li>tdk@mail.ntust.edu.tw</li>
                            </ul>
                            <br>
                            
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