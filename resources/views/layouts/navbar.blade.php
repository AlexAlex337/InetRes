<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}" />

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('select').formSelect();
        });

    </script>
    <script src="/js/laravel.ajax.js"></script>

</head>

<body>
    <nav class="light-blue darken-1">
        <div class="nav-wrapper">
            <div class="container">
                <a href="/" class="brand-logo"><i class="material-icons">cloud</i>Автомойка</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    @if (Route::has('login'))
                        @if (Auth::check() && Auth::user()->role == true)
                            <li><a href="/discount">Скидки</a></li>
                        @endif
                    @endif
                    <li><a href="/informations">Информация</a></li>
                    <li><a href="/price">Прайс-лист</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                    @if (Route::has('login'))
                        @if (Auth::check())
                            <li><a href="{{ url('/home') }}">Личный кабинет</a></li>
                        @else
                            <li><a href="{{ url('/login') }}">Войти</a></li>
                            <li><a href="{{ url('/register') }}">Регистрация</a></li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        @if (Route::has('login'))
            @if (Auth::check() && Auth::user()->role == true)
                <li><a href="/discount">Скидки</a></li>
            @endif
        @endif
        <li><a href="/informations">Информация</a></li>
        <li><a href="/price">Прайс-лист</a></li>
        <li><a href="/contacts">Контакты</a></li>
        @if (Route::has('login'))
            @if (Auth::check())
                <li><a href="{{ url('/home') }}">Личный кабинет</a></li>
            @else
                <li><a href="{{ url('/login') }}">Войти</a></li>
                <li><a href="{{ url('/register') }}">Регистрация</a></li>
            @endif
        @endif
    </ul>

    <main class="relative flex items-top justify-center min-h-screen">
        @yield('body')
    </main>

</body>

<footer class="page-footer light-blue darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">О компании</h5>
                <p class="grey-text text-lighten-4">Мы хотим, чтобы у каждого автомобилиста была возможность быстро
                    и качественно помыть автомобиль с минимальными расходами.
                    Нашими постоянными клиентами стали частные маршрутные такси, автобусы и муниципальный транспорт,
                    что благоприятно отразилось на внешнем облике городов.
                    Мы стремимся к тому, чтобы каждый автовладелец мог наслаждаться уходом за автомобилем.</p>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Ссылки</h5>
                <ul>
                    <li><a class="white-text" href="/informations">Информация</a></li>
                    <li><a class="white-text" href="/price">Прайс-лист</a></li>
                    <li><a class="white-text" href="/contacts">Контакты</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Социальные сети</h5>
                <ul>
                    <li><a class="white-text" href="https://vk.com/">Вконтакте</a></li>
                    <li><a class="white-text" href="https://instagram.com/">Instagram</a></li>
                    <li><a class="white-text" href="https://facebook.com/">Facebook</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="orange-text text-lighten-3" href="/">Igor Prozorov</a>
        </div>
    </div>
</footer>

</html>
