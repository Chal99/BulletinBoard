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

        <!-- <footer>
            @include('includes.footer')
        </footer> -->

    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>
