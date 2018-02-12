Категории: <a href="{{route('cat.new')}}">[+]</a>
<ul>
    @each('categories.tree.listing', $categories, 'category')
</ul>