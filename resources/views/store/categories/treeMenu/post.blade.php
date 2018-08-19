@php ( $cssclassActive = in_array($category->id, $currentCategoriesId) ? 'active' : '' )

<a href="{{route('cat.view', [$category])}}?{{ request()->getQueryString() }}">
    {{$category->name}} 
    <a href="{{route('cat.new', [$category])}}">[+]</a> 
    <span class="badge">{{$category->products_count}}</span>
</a>