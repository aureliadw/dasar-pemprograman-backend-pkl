@props(['label', 'name', 'options' => [], 'checked' => ''])

<div class="mb-3">
  <label class="form-label d-block">{{ $label }}</label>
  @foreach($options as $value => $text)
    <div class="form-check form-check-inline">
      <input 
        class="form-check-input" 
        type="radio" 
        name="{{ $name }}" 
        id="{{ $name . '_' . $value }}" 
        value="{{ $value }}"
        {{ old($name, $checked) == $value ? 'checked' : '' }}
      >
      <label class="form-check-label" for="{{ $name . '_' . $value }}">
        {{ $text }}
      </label>
    </div>
  @endforeach
</div>
