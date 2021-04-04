@extends('layouts.navbar')

@section('title')
    Прайс-лист
@endsection

@section('body')
    <div class="container">
        <h3>Прайс-лист</h3>
        @if (Route::has('login'))
            @if (Auth::check() && Auth::user()->role == true)
                <a class="waves-effect waves-light btn orange" href="{{ route('price.create') }}"><i
                        class="material-icons left">add_circle</i>Создать</a>
            @endif
        @endif
        <table>
            <thead>
                <tr>
                    <th>Название</th>
                    <th style="max-width: 300px">Описание</th>
                    <th>Цена</th>
                    @if (Route::has('login'))
                        @if (Auth::check() && Auth::user()->role == true)
                            <th></th>
                        @endif
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($prices as $price)
                    <tr>
                        <td>
                            @if (Route::has('login'))
                                @if (Auth::check() && Auth::user()->role == true)
                                    <a href="{{ route('price.show', $price) }}">{{ $price->name }}</a>
                                @else
                                    <a>{{ $price->name }}</a>
                                @endif
                            @endif
                        </td>
                        <td style="max-width: 300px">{{ $price->description }}</td>
                        <td>{{ $price->price }}</td>
                        @if (Route::has('login'))
                            @if (Auth::check() && Auth::user()->role == true)
                                <td class="center">
                                    <form method="POST" action="{{ route('price.destroy', $price) }}">
                                        <a href="{{ route('price.edit', $price) }}" class="btn green">Редактировать</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn red ajax" type="submit" name="action">Удалить</button>
                                    </form>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
        </table><br><br>
    </div>
@endsection
