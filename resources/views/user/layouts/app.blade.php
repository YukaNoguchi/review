<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>化粧品口コミサイト</title>
  <meta name="description" content="">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.css">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/user.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
  <div id="app">
    @include('user/layouts/header')
    <main>
      @yield('content')
    </main>
  </div>

</body>

</html>
