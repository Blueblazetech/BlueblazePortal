<!-- layouts/main.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your Website')</title>
    @yield('page-css')
    @include('layouts.master')
</head>
<body>
    <!-- Include the sidebar blade -->
  
    @yield('pg-menu')
    <div class="container">
        @yield('content')
    </div>

    @yield('page-js')
</body>
</html>
