<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow,noarchive" />
    <title>Error page</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>❌</text></svg>">
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Fonts -->

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" />

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

</head>
<body>
<div class="container d-flex justify-content-center position-absolute top-50 start-50 translate-middle">
    @yield('content')
</div>
</body>
</html>
