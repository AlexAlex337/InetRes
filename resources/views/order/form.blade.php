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

             <div style="overflow:hidden;">
           <div class="form-group">
              <div class="row">
                 <div class="col-md-8">
                    <div id="datetimepicker12"></div>
                 </div>
              </div>
           </div>
           <script type="text/javascript">
              $(function () {
                  $('#datetimepicker12').datetimepicker({
                      inline: true,
                      sideBySide: true
                  });
              });
           </script>
        </div>
            
           
            
            <div class="row">
                <button class="btn waves-effect waves-light green" type="submit" name="action">Записаться</button>
            </div>
        </form>
    </div><br>
@endsection
