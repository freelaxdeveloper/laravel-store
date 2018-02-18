@include('categories.tree.post', [
    'name' => $category->name,
    'id' => $category->id,
    'slug' => $category->slug,
])
@if (count($category->children))
    <ul>
        @each('categories.tree.listing', $category->children, 'category')
    </ul>
@endif