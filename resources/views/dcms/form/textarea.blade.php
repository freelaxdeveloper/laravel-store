@include('form.text', [
  'name' => $name, 
  'title' => $title,
  'method' => 'textarea', 
  'attributes' => $attributes,
  'required' => isset($required) ? $required : true,
])