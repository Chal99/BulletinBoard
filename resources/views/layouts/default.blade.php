<!doctype html>
<html>

<head>
    @include('includes.head')
</head>

<body>
    <header>
        @include('includes.header')
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>