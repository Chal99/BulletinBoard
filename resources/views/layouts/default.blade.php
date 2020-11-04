<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <div class="container">

        <header>
            @include('includes.header')
        </header>

        <div class="container">

            @yield('content')

        </div>

    </div>
    
</body>
</html>
