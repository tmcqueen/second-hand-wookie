<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    @stack('style-before')
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    @stack('styles-after')
</head>
<body>

    @yield('content')

</body>
    @stack('scripts-before')
    <script type="text/javascript" src="/js/app.js"></script>
    @stack('scripts-after')
</html>