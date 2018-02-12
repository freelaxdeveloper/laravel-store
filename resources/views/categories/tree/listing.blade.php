@include('categories.tree.post', [
    'name' => $category->name,
    'id' => $category->id,
])
@if (count($category->children))
    <ul>
        @each('categories.tree.listing', $category->children, 'category')
    </ul>
@endif