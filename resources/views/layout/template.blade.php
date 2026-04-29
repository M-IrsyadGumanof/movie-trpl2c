<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tiMovie - @yield('title')</title>

    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    {{-- Navbar --}}
    @include('layout.navbar')

    <div class="container my-3">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('layout.footer')

    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>
