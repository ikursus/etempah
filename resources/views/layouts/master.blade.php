<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
@yield('css')
</head>

<body>

  <a href="/">Utama</a>
  <a href="/login">Login</a>
  <a href="/dashboard">Dashboard</a>

  @include('layouts/alerts')

  @yield('body_content')

  <hr>
  <small>Hak Cipta Terpelihara.</small>

  @yield('javascript')
</body>

</html>
