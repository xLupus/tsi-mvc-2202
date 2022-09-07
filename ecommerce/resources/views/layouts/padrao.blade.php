<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
</head>
<body>
  @section('sidebar')
  ================== Header =======================
  @show
  <div class="container">
    @yield('content')
  </div>

</body>
</html>
