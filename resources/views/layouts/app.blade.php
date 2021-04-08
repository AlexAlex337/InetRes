<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Автомойка') }}</title>
    
    <style>
        .invalid-feedback {
        color: red;
        }
    </style>
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('customstyle')

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
        });

    </script>
    <scrtipt src="/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/js/laravel.ajax.js"></script>

</head>

<body>
    <nav class="light-blue darken-1">
        <div class="nav-wrapper">
            <div class="container">
                <a href="/" class="brand-logo"><i
                        class="material-icons">cloud</i>{{ config('app.name', 'Laravel') }}</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    @if (Route::has('login'))
                        @if (Auth::check())
                            <li><a href="/informations">Информация</a></li>
                            <li><a href="/price">Прайс-лист</a></li>
                            <li><a href="/contacts">Контакты</a></li>
                            <li><a>{{ Auth::user()->name }}</a></li>
                            <li>
                                <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @else
                            <li><a href="/informations">Информация</a></li>
                            <li><a href="/price">Прайс-лист</a></li>
                            <li><a href="/contacts">Контакты</a></li>
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
            @if (Auth::check())
                <li><a href="/informations">Информация</a></li>
                <li><a href="/price">Прайс-лист</a></li>
                <li><a href="/contacts">Контакты</a></li>
                <li><a>{{ Auth::user()->name }}</a></li>
                <li>
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Выйти
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
                <li><a href="/informations">Информация</a></li>
                <li><a href="/price">Прайс-лист</a></li>
                <li><a href="/contacts">Контакты</a></li>
                <li><a href="{{ url('/login') }}">Войти</a></li>
                <li><a href="{{ url('/register') }}">Регистрация</a></li>
            @endif
        @endif
    </ul>

    @yield('content')

</body>

</html>
