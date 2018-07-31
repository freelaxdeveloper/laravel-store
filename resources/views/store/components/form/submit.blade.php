@php
  $attributesDefault = [
    'class' => 'btn btn-custom-2 md-margin',
  ];

  if ( !empty($attributes) ) {
    $attributesDefault = array_merge($attributesDefault, $attributes);
  }
@endphp

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      {!! Form::submit($title, $attributesDefault) !!}
    </div>
</div>