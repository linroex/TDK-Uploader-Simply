<aside id="nav-container">
    <div class="slimScrollDiv">
        <ul id="nav" data-collapse-nav data-slim-scroll data-highlight-active>
            {{-- <li>
                <a href="">
                    <i class="fa fa-dashboard"></i>
                    <span>總覽</span>
                </a>
            </li> --}}
            {{-- <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>用戶</span>
                </a>

                <ul class="sub-nav" style>
                    <li><a href="">123</a></li>
                </ul>

                <i class="fa fa-caret-right icon-has-ul"></i>
            </li> --}}
            <li>
                <a href="{{url('/admin/issue/add')}}">
                    <i class="fa fa-plus"></i>
                    <span>新增任務</span>
                </a>
            </li>
            <li>
                <a href="{{url('admin/issue/list')}}">
                    <i class="fa fa-list"></i>
                    <span>檢視任務</span>
                </a>
            </li>
            
        </ul>

    </div>
</aside>
{{-- Aside end --}}

