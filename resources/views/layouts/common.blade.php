<!DOCTYPE html>
<html lang="ja">
<head>
@yield('head')
</head>
<body>
@yield('header')
@yield('img_content')
<div class="container mx-auto px-3 pt-3">
    @yield('content')
</div>
</body>
</html>