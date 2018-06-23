<li @if(count($category->children)) class="has-children" @endif>
@include('categories.treeMenu.post', [
			'name' => $category->name,
			'id' => $category->id,
			'slug' => $category->slug,
	])

	@if ( count($category->children) )
		<ul>
			<li><a href="{{route('cat.view', [$category])}}?{{ request()->getQueryString() }}">Перейти в "{{$category->name}}" <span class="badge">{{$category->products_count}}</span></a></li>
			@each('categories.treeMenu.listing', $category->children()->withCount('products')->get(), 'category')
		</ul>
	@endif
</li>