<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qwords</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>


<body>
  @include('template.header')
  <div class="w-full flex justify-center items-center content-center h-[calc(100vh-112px)]">
    <div class="flex align-content-center">
      @yield('content')
    </div>
  </div>
  @include('template.footer')
</body>

</html>
