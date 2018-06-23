@php ( $cssclassActive = in_array($category->id, $currentCategoriesId) ? 'active' : '' )

<a href="{{route('cat.view', [$category])}}?{{ request()->getQueryString() }}">
    {{$category->name}} <span class="badge">{{$category->products_count}}</span>
</a>