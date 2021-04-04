@extends('layouts.navbar')

@section('title')
    Добавление скидки
@endsection

@section('body')
    <div class="container">
        <h3>Добавление скидки</h3><br>

        <form method="POST" action="{{ route('discount.store') }}">
            @csrf
            <div class="row">
                <div class="input-field">
                    <select name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">Имя: {{ $user->name }} E-mail: {{ $user->email }}
                            </option>
                        @endforeach
                    </select>
                    <label>Клиент:</label>
                </div>
            </div>

            <div class="row">
                <label>Процент скидки:</label>
                <input name="discount_percent" type="number" min="1" max="40">
            </div>
            @error('discount_percent')
                <span class="red-text">{{ $errors->first('discount_percent') }}</span><br><br>
            @enderror

            <div class="row">
                <button class="btn waves-effect waves-light green" type="submit" name="action">Добавить скидку</button>
            </div>
        </form>
    </div><br>
@endsection
