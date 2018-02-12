{{$category->name}}<br>

@foreach ($category->getAncestorsAndSelf() as $breadcrumbs)
    {{$breadcrumbs->name}} 
@endforeach