<nav class="navbar navbar-expand-md shadow-sm" style="background-color:#151516">
    <div class="container">
        <a href="/home"><img src="../images/U.png" style="width: 180px;" alt="Unbreakable"></a>
        <button class="navbar-toggler" style="background-color:#ababab" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a style="font-family: 'Gotu', sans-serif; color:#ababab" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
                <li class="nav-item" style="margin-left:20px; margin-top:8px;">
                    <a style="font-family: 'Gotu', sans-serif; color:#ababab" href="http://unbreakable.me/posts">Training Moments</a>
                </li>
                <li class="nav-item" style="margin-left:20px; margin-top:8px;">
                    <a style="font-family: 'Gotu', sans-serif; color:#ababab" href="http://unbreakable.me/discussions">Discussions</a>
                </li>
                <li class="nav-item" style="margin-left:20px; margin-top:8px;">
                    <a style="font-family: 'Gotu', sans-serif; color:#ababab" href="http://unbreakable.me/posts/create">Share a Post</a>
                </li>
                <li class="nav-item" style="margin-left:20px; margin-top:8px;">
                    <a style="font-family: 'Gotu', sans-serif; color:#ababab" href="http://unbreakable.me/wts">Training Schedules</a>
                </li>
                @if(Auth()->user()->role == "Coach")
                    <li class="nav-item" style="margin-left:20px; margin-top:8px;">
                        <a style="font-family: 'Gotu', sans-serif; color:#ababab" href="http://unbreakable.me/wts/create">Update Training Schedule</a>
                    </li>
                @elseif(Auth()->user()->role == "Member")
                {{-- <li class="nav-item" style="margin-left:20px; margin-top:8px;">
                    <a style="font-family: 'Gotu', sans-serif; color:#ababab" href="http://unbreakable.me/pts">Private Training Session</a>
                </li> --}}
                @else
                <li class="nav-item" style="margin-left:20px; margin-top:8px;">
                    <a style="font-family: 'Gotu', sans-serif; color:#ababab" href="http://unbreakable.me/user/create">Register Users</a>
                </li>
                <li class="nav-item" style="margin-left:20px; margin-top:8px;">
                    <a style="font-family: 'Gotu', sans-serif; color:#ababab" href="http://unbreakable.me/admin/dashboard">Admin Dashboard</a>
                </li>
                @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" style="color:#ababab; font-family: 'Gotu', sans-serif; margin-left:10px;" class="nav-link {{-- dropdown-toggle --}}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="http://unbreakable.me/profile">
                                <i class="fas fa-user-alt"></i> Profile</a><hr>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
