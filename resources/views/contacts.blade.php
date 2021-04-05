@extends('layouts.navbar')

@section('title')
    Контакты
@endsection

@section('body')
    <div class="container">
        <h3>Контакты</h3>
        <h5>Региональный офис г.Киров</h5>

            <div class="col s6">
                <table class="highlight">
                    <tr>
                        <td><i class="material-icons">access_time</i></td>
                        <td>8:00 - 17:00 (Пн-Пт) Суббота, воскресенье (выходной)</td>
                    </tr>
                    <tr>
                        <td><i class="material-icons">near_me</i></td>
                        <td>610000, г.Киров, ул.Московская 36</td>
                    </tr>
                    <tr>
                        <td><i class="material-icons">phone_android</i></td>
                        <td></i>8 (800) 555-35-35</td>
                    </tr>
                    <tr>
                        <td><i class="material-icons">contact_mail</i></td>
                        <td>info@automoyka.ru</td>
                    </tr>
                    <tr>
                        <td><i class="material-icons">local_phone</i></td>
                        <td>8 (123) 456-78-90</td>
                    </tr>
                </table>
				
            <div class="col s6 right">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d734.8801966273545!2d49.66749524854306!3d58.603006351698056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa68e3999f250f620!2z0JLRj9GC0YHQutC40Lkg0JPQvtGB0YPQtNCw0YDRgdGC0LLQtdC90L3Ri9C5INCj0L3QuNCy0LXRgNGB0LjRgtC10YIgKNC60L7RgNC_0YPRgSAxKQ!5e0!3m2!1sru!2sru!4v1615143298322!5m2!1sru!2sru"
                    width=100% height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
@endsection
