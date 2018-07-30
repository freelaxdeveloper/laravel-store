<div class="modal-header">
  <h4 class="modal-title" id="myModalLabel">Отзыв о "{{ $product->title }}"</h4>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>

<div class="modal-body">
  {!! Form::open(['route' => ['prod.comment', $product]]) !!}
  @php($readonly = Auth::check() ? 'readonly' : null)

  @include('components.form.rating', ['title' => 'Рейтинг'])
  
  @include('components.form.text', [
    'name' => 'name', 
    'title' => 'Ваше имя', 
    'icon' => 'user', 
    'value' => Auth::user()->name ?? null,
    'attributes' => [
      'autofocus',
      'placeholder' => 'Ваше имя',
      $readonly
    ],
  ])

  @include('components.form.textarea', [
    'name' => 'comment', 
    'title' => 'Сообщение', 
    'icon' => 'message', 
    'attributes' => [
      'autofocus',
      'placeholder' => 'Сообщение',
    ],
  ])
  @include('components.form.submit', ['title' => 'Оставить отзыв'])

  {!! Form::close() !!}
</div>