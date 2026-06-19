<!doctype html>
<html lang="en">
<head>
    @include ('header')
</head>
<body style="@yield('bg')">
    @include('navigation')
    <main>
    @yield('content')
    </main>
    @include('footer')
</body>
</html>