@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => null,
    'multiple' => false,
    'placeholder' => 'Pilih opsi...'
])

<div class="mb-3">
  @if($label)
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
  @endif

  <select
    name="{{ $name }}{{ $multiple ? '[]' : '' }}"
    id="{{ $name }}"
    class="form-select select2"
    {{ $multiple ? 'multiple' : '' }}
  >
    @if(!$multiple && $placeholder)
      <option value="">{{ $placeholder }}</option>
    @endif

    @foreach($options as $value => $text)
      <option 
        value="{{ $value }}" 
        @if($multiple)
          {{ collect($selected)->contains($value) ? 'selected' : '' }}
        @else
          {{ $selected == $value ? 'selected' : '' }}
        @endif
      >
        {{ $text }}
      </option>
    @endforeach
  </select>
</div>
