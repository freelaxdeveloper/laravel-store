@extends('layouts.menuLeft')

@section('content-menu')
  <div class="actions">
    @foreach ($actions as $action)
      <a href="{{$action['link']}}" class="action">{{$action['title']}}</a>
    @endforeach
  </div>
@endsection