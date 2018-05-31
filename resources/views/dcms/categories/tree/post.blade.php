@php ( $cssclassActive = in_array($category->id, $currentCategoriesId) ? 'active' : '' )

<a href="{{route('cat.view', [$category])}}" class="list-group-item {{ $cssclassActive }}">
    {{$category->name}} <span class="badge">{{$category->products_count}}</span>
</a>

 {{-- <input id="n-{{$id}}" type="checkbox">
    <label for="n-{{$id}}">{{$name}} @if (count($category->children)) ({{count($category->children)}}) @endif <a href="{{route('cat.new', [$slug])}}">[+]</a> | <a href="{{route('cat.delete', [$slug])}}">[-]</a></label> --}}
    {{--  <a href="{{route('cat.view', [$slug])}}">{{$name}}</a> <a href="{{route('cat.new', [$slug])}}">[+]</a> |  <a href="{{route('cat.delete', [$slug])}}">[-]</a>  --}}
