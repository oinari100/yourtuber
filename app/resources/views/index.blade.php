<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="twitter:card" content="summary_large_image">
  <meta property="og:title" content="YourTube">
  <meta property="og:image" content="https://yourtube.co.jp/img/top/top-img.svg">
  <meta property="og:description" content="好みのジャンルを選んで、あなたにオススメ動画を検索する！">
  <meta property="og:url" content="https://yourtube.co.jp/">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="メカトロ同好部エルチカ">
  <meta name="twitter:site" content="https://yourtube.co.jp/">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="YourTube">
  <meta name="twitter:image" content="https://yourtube.co.jp/img/top/top-img.svg">
  <meta name="twitter:description" content="好みのジャンルを選んで、あなたにオススメ動画を検索する！">

  <title>YourTube | オススメYoutube動画診断サービス</title>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>

  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather|Roboto:400">
  <link rel="stylesheet" href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

  <!-- Styles -->
  <link href="{{asset('/css/reset.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://hypertext-candy.s3-ap-northeast-1.amazonaws.com/posts/vue-laravel-tutorial/app.css">
</head>
<body>
  <div id="app"></div>
</body>
</html>