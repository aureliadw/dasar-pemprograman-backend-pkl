@props(['label' => '', 'name', 'id' => $name, 'rows' => 3, 'class' => 'form-control'])

<div class="mb-3">
    @if($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif
    <textarea 
        name="{{ $name }}" 
        id="{{ $id }}" 
        rows="{{ $rows }}" 
        {{ $attributes->merge(['class' => $class]) }}
    >{{ $slot ?? old($name) }}</textarea>
</div>
