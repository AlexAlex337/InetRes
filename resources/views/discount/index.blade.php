@extends('layouts.navbar')

@section('title')
    Скидки
@endsection

@section('body')
    <div class="container">
        <h3>Скидки</h3>
        <a class="waves-effect waves-light btn orange" href="{{ route('discount.create') }}"><i
                class="material-icons left">add_circle</i>Создать</a>
        <table>
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Процент скидки</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($discounts as $discount)
                    <tr>
                        <td>{{ $discount->name }}</td>
                        <td>{{ $discount->email }}</td>
                        <td>{{ $discount->discount_percent }}</td>
                        <td class="center">
                            <form method="POST" action="{{ route('discount.destroy', $discount->user_id) }}">
                                {{-- <a href="{{ route('discount.edit', $discount->user_id) }}" class="btn green">Редактировать</a> --}}
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn red" type="submit" name="action">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </table><br><br>
    </div>
@endsection
