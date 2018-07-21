@php
  $attributesDefault = [
    'class' => 'form-control',
  ];

  if ( !empty($attributes) ) {
    $attributesDefault = array_merge($attributesDefault, $attributes);
  }
  $icon = isset($icon) ? "<i class='fa fa-{$icon} prefix grey-text'></i> " : null;

  // if(isset($empty))
  //   $items->prepend(false, false);
@endphp

<div class="form-group">
  {!! Form::label($name, "{$icon} {$title}", [], false) !!}
  {!! Form::select($name, $items, null, $attributesDefault) !!}
</div>