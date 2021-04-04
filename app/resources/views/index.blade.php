<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="twitter:card" content="summary">
  <meta property="og:url" content="http://ec2-54-249-6-111.ap-northeast-1.compute.amazonaws.com/">
  <meta property="og:title" content="YourTube">
  <meta property="og:description" content="好みのジャンルを選んで、あなたにオススメ動画を検索する！">
  <meta property="og:image" content="http://ec2-54-249-6-111.ap-northeast-1.compute.amazonaws.com/img/top-img-content.svg">
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