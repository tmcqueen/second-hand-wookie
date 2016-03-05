<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow">

    @stack('styles-before')
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    @stack('styles-after')

    <title>Foomatic</title>

</head>
<body>

    @yield('content')

    @stack('scripts-before')
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    @stack('scripts-after')
</body>
</html>