@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm bg-emerald-500 py-3 px-4 test-white rounded']) }}>
        {{ $status }}
    </div>
@endif
