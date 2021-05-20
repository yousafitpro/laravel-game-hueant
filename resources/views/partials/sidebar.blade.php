<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" style="width: 100px; height: 100px" src="{{asset(Auth::user()->profile_image)}}"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{Auth::user()->fname.' '.Auth::user()->lname}}</span>
                        <span class="text-muted text-xs block">More <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{route('user.showProfile')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li>
                <a href="layouts.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li >
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Submenus</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="index.html">Dashboard v.1</a></li>
                    <li><a href="dashboard_2.html">Dashboard v.2</a></li>
                    <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                    <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                    <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
