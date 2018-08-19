<li @if(count($category->children)) class="has-children" @endif>
@include('categories.treeMenu.post', [
			'name' => $category->name,
			'id' => $category->id,
			'slug' => $category->slug,
	])

	@if ( count($category->children) )
		<ul>
			@each('categories.treeMenu.listing', $category->children()->withCount('products')->get(), 'category')
		</ul>
	@endif
</li>