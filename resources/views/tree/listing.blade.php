@include('tree.post', [
    'name' => $category->name,
])
@if (count($category->children))
    <ul>
        @each('tree.listing', $category->children, 'category')
    </ul>
@endif