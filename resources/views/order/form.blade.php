@extends('layouts.navbar')

@section('title')
    Запись на мойку
@endsection

@section('body')
    <div class="container">
        <h3>Запись на мойку</h3>

        <form method="POST" action="{{ route('order.store') }}">
            @csrf
            <div class="row">
                <div class="input-field">
                    <select name="price_id">
                        @foreach ($prices as $price)
                            <option value="{{ $price->id }}">{{ $price->name }} Цена: {{ $price->price }}</option>
                        @endforeach
                    </select>
                    <label>Услуга:</label>
                </div>
            </div>
            @error('price_id')
                <span class="red-text">{{ $errors->first('price_id') }}</span><br><br>
            @enderror

          <div class="container">
               
</div>
        <div class="row">
                <!--div class='input-group date' id='datetimepicker11'-->
                <label>Дата и время:</label>
                <input name="time" type="time" min=<?php echo date('Y-m-d\TH:i');?>>
                <!--span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
                </div-->
            </div>
            @error('time')
                <span class="red-text">{{ $errors->first('time') }}</span><br><br>
            @enderror
            
            
           
            
            <div class="row">
                <button class="btn waves-effect waves-light green" type="submit" name="action">Записаться</button>
            </div>
        </form>
    </div><br>
            <script src="/js/bootstrap-datetimepicker.min.js"></scrtip>
@endsection
