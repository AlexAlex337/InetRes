@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Регистрация</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row">
                <input placeholder="Имя" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <input placeholder="E-mail" id="email" type="text" pattern="[а-яa-z0-9._%+-]+@[а-яa-z0-9.-]+\.[а-яa-z]{2,4}$" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <input placeholder="Пароль" id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <input placeholder="Подтверждение пароля" id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-primary">
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
@endsection
