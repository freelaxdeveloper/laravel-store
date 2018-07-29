<div class="modal-header">
  <h4 class="modal-title" id="myModalLabel">Управление "{{ $product->title }}"</h4>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>

<div class="modal-body">

  @foreach ( $product->adminActions as $action)
    <p><a href="{{ $action['link'] }}">{{ $action['title'] }}</a></p>
  @endforeach

</div>
