@extends('layouts.navbar')

@section('title', isset($price) ? 'Редактирование прайс-листа ' . $price->name : 'Создать прайс-лист')

@section('body')
    <div class="container">
        <h3>{{ isset($price) ? 'Редактирование прайс-листа ' . $price->name : 'Создать прайс-лист' }}</h3>

        <a class="waves-effect waves-light btn orange" href="{{ route('price.index') }}"><i
                class="material-icons left">arrow_back</i>Назад</a><br><br>
        <form method="POST" @if (isset($price)) action="{{ route('price.update', $price) }}"
            @else
                                    action="{{ route('price.store') }}" @endif>
            {{ isset($price) ? method_field('PUT') : method_field('POST') }}
            {{ csrf_field() }}
            <div class="row">
                <input name="name" value="{{ old('name', isset($price) ? $price->name : null) }}" type="text"
                    class="form-control" placeholder="Название" aria-label="name" id="name">
                    <label for="name">Название</label>
            </div>
            @if ($errors->has('name'))
                <span class="red-text">{{ $errors->first('name') }}</span>
            @endif
            <div class="row">
                <input name="description" value="{{ old('description', isset($price) ? $price->description : null) }}"
                    type="text" class="form-control" placeholder="Описание" aria-label="description" id="description">
                    <label for="description">Описание</label>
            </div>
            @if ($errors->has('description'))
                <span class="red-text">{{ $errors->first('description') }}</span>
            @endif
            <div class="row">
                <input name="price" value="{{ old('price', isset($price) ? $price->price : null) }}" type="text"
                    class="form-control" placeholder="Цена" aria-label="price" id="price">
                    <label for="price">Цена</label>
            </div>
            @if ($errors->has('price'))
                <span class="red-text">{{ $errors->first('price') }}</span><br><br>
            @endif
            <div class="row">
                <button class="btn waves-effect waves-light green" type="submit"
                    name="action">{{ isset($price) ? 'Обновить' : 'Добавить' }}</button>
            </div>
        </form>
    </div>
@endsection
