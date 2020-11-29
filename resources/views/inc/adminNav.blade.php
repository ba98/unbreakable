<style>
a{
    font-family: 'Gotu', sans-serif;
    color:#ababab !important;
    font-size: 90%;
}
li{
    margin-left:18px;
    margin-top:5px;
    margin-bottom: -10px;
}
</style>
<nav class="navbar navbar-expand-md shadow-sm" style="background-color:#151516; padding-bottom:12px">
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
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                <li class="nav-item" style="">
                    <a href="http://unbreakable.me">Home</a>
                </li>
                <li class="nav-item" style="">
                    <a href="http://unbreakable.me/admin/dashboard">Control Panel</a>
                </li>
                <li class="nav-item" style="">
                    <a href="http://unbreakable.me/user/create">Register Users</a>
                </li>
                <li class="nav-item" style="">
                    <a href="http://unbreakable.me/admin/users">Manage Users</a>
                </li>
                <li class="nav-item" style="">
                    <a href="http://unbreakable.me/admin/pts">Private Training Sessions</a>
                </li>
                <li class="nav-item" style="">
                    <a href="http://unbreakable.me/admin/wts">Weekly Training Sessions</a>
                </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" style="margin-bottom:5px; margin-top:-6px;" class="nav-link {{-- dropdown-toggle --}}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
