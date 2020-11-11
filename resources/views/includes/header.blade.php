<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">Bulletin Board</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('user-list')}}">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('post-list')}}">Posts</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Create User</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Admin
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </li>
    </ul>
</nav>