<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Bulletin Board</a>
        </li>
        @if (!Auth::check())
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
        </li>
        @endif
        @if (Auth::check())
        @if(Auth::user()->type==1)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">Users</a>
        </li>
        @endif
        @endif
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif

        @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.create') }}">{{ __('Create User') }}</a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile.index') }}">
                    Profile
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>
</nav>