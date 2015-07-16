<section id="header" class="top-header">
    <header class="clearfix">
        <div class="logo bg-primary">
            <a href="">
                <span class="glyphicon glyphicon-fire logo-icon"></span>
                <span>TDK 19</span>
            </a>
        </div>

        <div class="menu-button" toggle-off-canvas="">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </div>

        <div class="top-nav">
            <div class="navbar-nav nav pull-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        {{Session::get('user')->team_name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="">Profile</a></li>
                        <li><a href="{{url('logout')}}">Logout</a></li>
                    </ul>
                </li>
            </div>
            
        </div>
    </header>
</section>
{{-- Section header end --}}