    <input id="n-{{$id}}" type="checkbox">
    <label for="n-{{$id}}">{{$name}} @if (count($category->children)) ({{count($category->children)}}) @endif <a href="{{route('cat.new', [$slug])}}">[+]</a> | <a href="{{route('cat.delete', [$slug])}}">[-]</a></label>
    {{--  <a href="{{route('cat.view', [$slug])}}">{{$name}}</a> <a href="{{route('cat.new', [$slug])}}">[+]</a> |  <a href="{{route('cat.delete', [$slug])}}">[-]</a>  --}}
