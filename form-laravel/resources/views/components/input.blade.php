@props([
    'type' => 'text',
    'name' => '',
    'value' => '',
    'label' => null,
    'class' => '',
])

@php
    $id = $attributes->get('id') ?? $name;
@endphp

<div class="mb-3">
  @if($label)
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
  @endif

  <input 
      type="{{ $type }}" 
      name="{{ $name }}" 
      id="{{ $id }}" 
      value="{{ old($name, $value) }}" 
      {{ $attributes->merge(['class' => 'form-control ' . $class]) }}
  />
</div>
