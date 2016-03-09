<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    @stack('styles-before')
    @stack('styles-after')

    <title>Foomatic</title>

</head>
<body>
    @include('layouts.first-nav')

    @include('layouts.second-nav')

    @yield('content');

    @include('footer')

    @stack('scripts-before')
    @stack('scripts-after')
</body>
</html>