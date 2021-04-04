@extends('layouts.navbar')

@section('title')
    Автомойка
@endsection

@section('body')

    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <div class="row">
                <div class="center">
                    <img class="col s6 offset-s3" src="https://avto1sto.ru/images/wash-car.png">
                </div>
            </div>
            <h1 class="header center orange-text">Автомойка</h1>
            <div class="row center">
                <h5 class="header col s12 light">Теперь чистый автомобиль – это не роскошь, это комфорт и экономия средств,
                    удовольствие от ухода за автомобилем и сервис в деталях.</h5>
            </div>
            <div class="row center">
                @if (Auth::check())
                    <a href="/home" id="download-button" class="btn-large waves-effect waves-light orange">Записаться на
                        мойку</a>
                @else
                    <a href="/login" id="download-button" class="btn-large waves-effect waves-light orange">Записаться на
                        мойку</a>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="large material-icons">assignment_turned_in</i></h2>
                        <h5 class="center">Стандарты качества</h5>
                        <p class="light center">Высокие стандарты качества обслуживания.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="large material-icons">access_time</i></h2>
                        <h5 class="center">Работаем 24 часа</h5>

                        <p class="light center">Круглосуточная работа моек и горячей линии.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center light-blue-text"><i class="large material-icons">attach_money</i></h2>
                        <h5 class="center">Программа лояльности</h5>
                        <p class="light center">Скидки до 40% по карте клиента.</p>
                    </div>
                </div>
            </div>

        </div>
        <br><br>
    </div>

@endsection
