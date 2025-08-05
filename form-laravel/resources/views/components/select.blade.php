@props([
    'name',
    'label' => null,
    'id' => $name,
    'options' => [],
    'selected' => '',
    'class' => 'form-control'
])

<div class="form-group">
    @if ($label)
        <label for="{{ $id }}">{{ $label }}</label>
    @endif

    <select 
        name="{{ $name }}" 
        id="{{ $id }}" 
        {{ $attributes->merge(['class' => $class]) }}
    >
        @foreach($options as $key => $optionLabel)
            <option value="{{ $key }}" {{ $key == old($name, $selected) ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
</div>
