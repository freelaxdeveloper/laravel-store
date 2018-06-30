@extends('layouts.menuLeft')

@section('content-menu')
  <form class="form-amount-box">
    <div class="form-group">
      <label>Текущий ценовой диапазон</label>
      <div id="slider-container"></div>
    </div>
    <div class="form-group amount-box flex-between">
        <div class="">
          <label for="amount-from">От: </label>
          <input type="text" id="amount-from" onkeypress="return isNumberKey(event)" value="500">
        </div>
        <div class="">
          <label for="amount-to">До: </label>
          <input type="tel" id="amount-to" onkeypress="return isNumberKey(event)" value="15000">
        </div>
    </div>
    <div class="flex-between">
    <button type="reset" class="btn btn-reset">Сбросить</button>
    <button type="submit" class="btn btn-info btn-filter btn-bidnow">Фильтровать</button>
    </div>

  </form>      
@endsection