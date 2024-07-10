@props(['type' => 'text', 'name', 'value' => '', 'placeholder' => '', 'class' => ''])

<input
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'form-input '.$class]) }}
/>
