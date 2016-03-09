<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    @stack('styles-before')
    @stack('styles-after')

    <title>Foomatic|Events</title>

</head>
<body>

    @yield('content')

    @stack('scripts-before')
    @stack('scripts-after')
</body>
</html>