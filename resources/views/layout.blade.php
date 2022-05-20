<!DOCTYPE html>
<html lang="ru">
<head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        @yield('head')
        <link href="/css/normalize.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="../../public/img/yeti.png" rel="icon">
</head>
<body>
    <div class="page-wrapper">
      <x-header></x-header>
      <main @yield('class')>
            @yield('page-content')
      </main>
    </div>
    <x-footer></x-footer>
</body>
@yield('scripts')
</html>
