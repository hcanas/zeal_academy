<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="w-full h-full">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Zeal Academy</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Changa+One&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="w-full h-full overflow-hidden">
  <div id="app" class="w-full h-full"></div>
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
