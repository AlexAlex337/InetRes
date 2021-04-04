@extends('layouts.app')
@section('customstyle')
    <style>
        .flex {
            background-color:#4CAF50
        }
        .flex-1{
            margin-left: 25px;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <h3>Личный кабинет</h3>
        <div class="chip">
            <img src="{{isset(Auth::user()->avatar)? Auth::user()->avatar: "https://w7.pngwing.com/pngs/298/37/png-transparent-computer-icons-facebook-social-media-logo-silhouette-portrait-logo-head-thumb-signal.png"}}"
                alt="Contact Person">
            {{ Auth::user()->name }}, здравствуйте!
        </div><br><br>

        @isset($discount[0])
            <div>
                <div class="card-panel green lighten-4"><span><b>Система лояльности:</b></span><br>Ваш процент скидки =
                    {{ isset($discount[0]) ? $discount[0]->discount_percent : '' }}%</div>
            </div><br>
        @endisset

        <a class="waves-effect waves-light btn green" href="{{ route('order.create') }}"><i
                class="material-icons left">add_circle</i>Записаться на мойку</a><br><br>

        <ul class="collection with-header">
            <li class="collection-header">
                <h5>Будущие записи на мойку</h5>
            </li>
            @foreach ($futurerecords as $futurerecord)
                <li class="collection-item avatar">
                    <div class="row">
                        <div class="col s6">
                            <i class="material-icons circle blue darken-2">drive_eta</i>
                            <span class="title">Услуга: {{ $futurerecord->name }}</span>
                            <p>Дата: {{ $futurerecord->time }}<br>
                                Цена: {{ $futurerecord->sum }}
                            </p>
                        </div>
                        <div class="col s6">
                            <form method="POST" action="{{ route('order.destroy', $futurerecord->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn red right" type="submit" name="action">Отменить запись</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
            {{ $futurerecords->appends(['past' => $pastrecords->currentPage()])->links() }}
        </ul>

        <ul class="collection with-header">
            <li class="collection-header">
                <h5>Прошлые записи на мойку</h5>
            </li>
            @foreach ($pastrecords as $pastrecord)
                <li class="collection-item avatar">
                    <i class="material-icons circle green">check</i>
                    <span class="title">Услуга: {{ $pastrecord->name }}</span>
                    <p>Дата: {{ $pastrecord->time }}<br>
                        Цена: {{ $pastrecord->sum }}
                    </p>
                </li>
            @endforeach
            {{ $pastrecords->appends(['future' => $futurerecords->currentPage()])->links() }}
        </ul>
    </div>
@endsection
