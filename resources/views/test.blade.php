<ul>
    @foreach($categories as $node)
        {!! renderNode($node) !!}
    @endforeach
</ul>