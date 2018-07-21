@php
  $attributesDefault = [
    'class' => 'form-control input-lg',
    'required',
  ];

  if (isset($required) && false === $required) {
    unset($attributesDefault[array_search('required', $attributesDefault)]);
  }

  if ( !empty($attributes) ) {
    $attributesDefault = array_merge($attributesDefault, $attributes);
  }
  $method = $method ?? 'text';
  $icon = isset($icon) ? "<span class='input-icon input-icon-{$icon}'></span> " : null;

  $value = old($name) ?? $value ?? null;
@endphp

<div class="input-group">
  {{-- {!! Form::label($name, "<span class='input-group-addon'>{$icon} {$title}</span>", [], false) !!} --}}
  <span class='input-group-addon'>{!! $icon !!} {!!$title!!}</span>
  @if ( 'password' == $method )
    {!! Form::$method($name, $attributesDefault) !!}
  @else
    {!! Form::$method($name, $value, $attributesDefault) !!}
  @endif
  
  @if ($errors->has($name))
      <span class="invalid-feedback" style="display: block;">
          <strong>{{ $errors->first($name) }}</strong>
      </span>
  @endif
</div>