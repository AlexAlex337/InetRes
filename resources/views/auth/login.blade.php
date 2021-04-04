@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Вход</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <input placeholder="E-mail" id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <input placeholder="Пароль" id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <p>
                    <label>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                        <span for="remember">Запомнить меня</span>
                    </label>
                </p>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-primary">
                    Войти
                </button>
                <a class="btn blue" href="{{ route('vk.auth') }}"><i class="material-icons left">beenhere</i>Войти через ВК</a>

                {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Забыли пароль?
                    </a>
                @endif --}}
            </div>

        </form>

    </div>
@endsection
