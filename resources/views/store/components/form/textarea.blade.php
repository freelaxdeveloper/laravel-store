@if( !isset($attributes['rows']) )
  @php($attributes['rows'] = 3)
@endif
@php ($groupClass = 'input-group textarea-container')
@include('components.form.text', [
  'name' => $name, 
  'title' => $title,
  'method' => 'textarea', 
  'attributes' => $attributes,
  'required' => isset($required) ? $required : true,
  'groupClass' => $groupClass,
])