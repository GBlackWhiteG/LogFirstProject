<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<nav class="nav">
    <div class="container">
        <div class="wrapper__nav">
            <a href="{{ route('product.index') }}">Logo</a>
            <div class="items__nav">
                <a href="{{ route('product.index') }}">Каталог</a>
                <a href="{{ route('order.index') }}">Заказы</a>
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                        <a href="{{ route('admin.index') }}">Админ.панель</a>
                    @endif
                    <a href="{{ route('user.logout') }}">Выход</a>
                @else
                    <a href="{{ route('user.signup') }}">Регистрация</a>
                    <a href="{{ route('user.login') }}">Вход</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<main class="main">
    @yield('content')
</main>
<footer class="footer">
    <div class="container">
        FOOTER
    </div>
</footer>
</body>
</html>
