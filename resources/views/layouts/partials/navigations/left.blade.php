<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="sidebar-top">
            <div class="user-panel">
                <div class="user-panel-avt">
                    <div class="image">
                        @if(Auth::user()->customer()->first() != null and Auth::user()->customer()->first()->avatar != '')
                            <img src="{{ asset(Auth::user()->customer()->first()->avatar) }}" class="img-circle" alt="{{ Auth::user() == null ? "" : mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}">
                        @else
                            <p><b>{{ Auth::user() == null ? "" : mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}</b></p>
                        @endif
                    </div>
                </div>
                <div class="user-panel-info">
                    <div class="info">
                        <p>{{ Auth::user() == null ? "" : Auth::user()->name }}</p>
                    </div>
                    <div class="sign-out" style="display: none;">
                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                            onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                            "> Đăng xuất</i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                @if(isset($leftmenu) and count($leftmenu) != 0)
                    @foreach($leftmenu as $module)
                        <li class="header header-system">{{ $module['name'] }}</li>
                        @foreach($module['applicationfunctiongroups'] as $functiongroups)
                            <li class="treeview">
                                @if(isset($functiongroups['filename']) and $functiongroups['filename'] != '')
                                    <li class="list-menu"><a href="{{ route($functiongroups['filename']) }}" data-name="{{ $functiongroups['filename'] }}"><i class="{{ $functiongroups['image'] }}"></i>{{ $functiongroups['name'] }}</a></li>
                                @else
                                    <a href="#">
                                        <i class="{{ $functiongroups['image'] }}"></i><span>{{ $functiongroups['name'] }}</span>
                                        @if(isset($functiongroups['functionassignment']) and count($functiongroups['functionassignment']) != 0)
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                        @endif
                                    </a>
                                @endif
            
                                <ul class="treeview-menu">
                                @foreach($functiongroups['functionassignment'] as $functionassignment)
                                    <li><a href="{{ route($functionassignment['filename']) }}" data-name="{{ $functiongroups['filename'] }}><i class="{{ $functionassignment['image'] }}"></i>{{ $functionassignment['name'] }}</a></li>
                                @endforeach
                                </ul>
                            </li>
                        @endforeach
                    @endforeach
                @endif
            </ul>
        </div>

        <ul class="sidebar-menu sidebar-setting" data-widget="tree">
            <!-- <li class="list-menu"><a href="#" data-name=""><i class="fa fa-cog"></i>Cài đặt</a></li> -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i><span>Cài đặt</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                            "> Đăng xuất</i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
<!-- /.sidebar -->
</aside>