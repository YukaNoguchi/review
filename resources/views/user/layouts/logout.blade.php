<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>化粧品口コミサイト</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/user.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>

<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
