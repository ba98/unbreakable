<style>
.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}
#sidebar {
    min-width: 220px;
    max-width: 220px;
    min-height: 100vh;
}
a[data-toggle="collapse"] {
    position: relative;
}
.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}
a, a:hover, a:focus {
    color: #ababab;
    text-decoration: none;
    transition: all 0.3s;
}

#sidebar {
    background: #151516;
    color: #ababab;
    transition: all 0.3s;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #151516;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #60779c;
}

#sidebar ul {
    color: #60779c;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #60779c;
    background: #151516;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #60779c;
}
ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
}

#sidebar.active {
    min-width: 90px;
    max-width: 90px;
    text-align: center;
}

#sidebar .sidebar-header strong {
    display: none;
}
#sidebar.active .sidebar-header h3 {
    display: none;
}
#sidebar.active .sidebar-header strong {
    display: block;
}

#sidebar ul li a {
    text-align: left;
    padding: 20px 10px;
}

#sidebar.active ul li a {
    padding: 10px 10px;
    text-align: center;
    font-size: 0.80em;
}

#sidebar.active ul li a i {
    margin-right:  0;
    display: block;
    font-size: 1.5em;
    margin-bottom: 5px;
}

#sidebar.active ul ul a {
    padding: 10px !important;
}

#sidebar.active .dropdown-toggle::after {
    top: auto;
    bottom: 10px;
    right: 50%;
    -webkit-transform: translateX(50%);
    -ms-transform: translateX(50%);
    transform: translateX(50%);
}

@media (max-width: 800px) {
    #sidebar.active {
        min-width: 90px;
        max-width: 90px;
        text-align: center;
        margin-left: -90px !important;
    }

    #sidebar .sidebar-header strong {
        display: none;
    }

    #sidebar.active .sidebar-header h3 {
        display: none;
    }

    #sidebar.active .sidebar-header strong {
        display: block;
    }

    #sidebar.active ul li a {
        padding: 20px 10px;
        font-size: 0.85em;
    }

    #sidebar.active ul li a i {
        margin-right:  0;
        display: block;
        font-size: 1.8em;
        margin-bottom: 5px;
    }

    #sidebar.active ul ul a {
        padding: 10px !important;
    }

    .dropdown-toggle::after {
        top: auto;
        bottom: 10px;
        right: 50%;
        -webkit-transform: translateX(50%);
        -ms-transform: translateX(50%);
        transform: translateX(50%);
    }
}
h3{
    font-size: 168%;
        margin-bottom: -20%;
}
</style>
    <div class="wrapper" style="font-family: 'Gotu', sans-serif;">
        <nav id="sidebar" class="d-none d-md-block">
            <div class="sidebar-header">
                <h3>MENU</h3>
                <strong>MENU</strong>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="http://unbreakable.me/profile">
                        <i class="fas fa-user"></i>
                        Profile
                    </a>
                    <a href="http://unbreakable.me/posts">
                        <i class="far fa-images"></i>
                        Training Moments
                    </a>
                    <a href="http://unbreakable.me/discussions">
                        <i class="fas fa-users"></i>
                        Discussions
                    </a>
                    <a href="http://unbreakable.me/posts/create">
                        <i class="far fa-image"></i>
                        Share a Post
                    </a>
                    <a href="http://unbreakable.me/wts">
                        <i class="far fa-calendar-alt"></i>
                        Training Schedules
                    </a>

                    @if(Auth()->user()->role == "Coach")
                    <a href="http://unbreakable.me/wts/create">
                        <i class="far fa-calendar-plus"></i>
                        Update Training Schedule
                    </a>
                    <a href="http://unbreakable.me/pts/respond">
                        <i class="fas fa-inbox"></i>
                        Your PTS Requests
                    </a>
                    @elseif(Auth()->user()->role == "Member")

                    @else
                    <a href="http://unbreakable.me/admin/dashboard">
                        <i class="fas fa-users-cog"></i>
                        Admin Dashboard
                    </a>
                    @endif

                    {{-- Logout --}}
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    {{-- End of logout --}}

                </li>
            </ul>
        </nav>

        <div class="container-fluid" id="content">
            <button class="d-none d-md-block btn btn-light desButton" type="button" id="sidebarCollapse" style="margin-top:10px; margin-left:10px; margin-bottom:10px;">
                <i class="fas fa-align-left"><span> Minimize | Maximize</span></i>
            </button><br>
        {{-- </div>
    </div> --}}
