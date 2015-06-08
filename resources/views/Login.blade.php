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
                            <a href="">TDK Uploader</a>
                        </section>
                    </div>    
                </div>
                {{-- Signin header end --}}

                <div class="singin-body">
                    <div class="container">
                        <div class="form-container">
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