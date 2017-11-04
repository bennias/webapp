<nav class="navbar navbar-inverse navbar-static-top navbar-toggleable-md">
    <!-- Branding Image -->
    <a class="navbar-brand" href="{{ url('/home') }}">
        {{ config('app.name', 'BAS') }}
    </a>
    <!-- Right Side Of Navbar -->
    <ul>
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>

        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/tasks') }}">Tasks</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li class="dropdown-item">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
    <!-- </div> -->
</nav>