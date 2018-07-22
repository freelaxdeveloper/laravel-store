@php
  $attributesDefault = [
    'class' => 'selectbox',
  ];

  if ( !empty($attributes) ) {
    $attributesDefault = array_merge($attributesDefault, $attributes);
  }
  $icon = isset($icon) ? "<i class='fa fa-{$icon} prefix grey-text'></i> " : null;

  // if(isset($empty))
  //   $items->prepend(false, false);
@endphp

<div class="form-group">
  {!! Form::label($name, "{$icon} {$title}", ['class' => 'control-label'], false) !!}
  <div class="input-container normal-selectbox">
    {!! Form::select($name, $items, null, $attributesDefault) !!}
  </div>
</div>
<div class="xss-margin"></div>