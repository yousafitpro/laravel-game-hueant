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
                <a href="javascript:void"><i class="fa fa-users"></i> <span class="nav-label">Withdrawal Request</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('admin.user.add')}}">Withdrawal Request</a></li>
                    <li><a href="{{route('admin.user.getAll')}}">Withdrawal History</a></li>
                </ul>
            </li>

            <li>
                <a href="layouts.html"><i class="fa fa-trophy"></i> <span class="nav-label">Manage Lottary</span></a>
            </li>
            <li>
                <a href="layouts.html"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Manage Post</span></a>
            </li>
            <li >
                <a href="javascript:void"><i class="fa fa-gamepad"></i> <span class="nav-label">Tournament & Games</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('admin.user.add')}}">Tournaments</a></li>
                    <li><a href="{{route('admin.user.getAll')}}">Games</a></li>
                </ul>
            </li>
            <li >
                <a href="javascript:void"><i class="fa fa-users"></i> <span class="nav-label">Users</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('admin.user.add')}}">Add New</a></li>
                    <li><a href="{{route('admin.user.getAll')}}">Users</a></li>
                </ul>
            </li>
            <li >
                <a href="javascript:void"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{route('admin.role.getAll')}}">Roles</a></li>
                    <li><a href="dashboard_2.html">Web Configurations</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
