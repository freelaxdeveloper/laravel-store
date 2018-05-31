<div>
    @include('categories.tree.post', [
        'name' => $category->name,
        'id' => $category->id,
        'slug' => $category->slug,
    ])

    @if ( count($category->children) && in_array($category->id, $currentCategoriesId) )
        <div class="sub" style="margin-left:5px; border: 1px solid #ddd">
            @each('categories.tree.listing', $category->children, 'category')
        </div>
    @else
        {{--  <div class="sub">
            <div style="margin-left:15px; color:#575757;">(пусто)</div>
        </div>  --}}
    @endif
</div>