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
                            <form action="" class="form-horizontal">
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
                                        <a href="" class="btn btn-block btn-lg btn-primary">登入</a>
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