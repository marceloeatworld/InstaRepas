@props(['status'])

@if ($status)
    <div
        aria-live="polite"
        {{ $attributes->merge(['class' => 'rounded-3xl border border-emerald-200 bg-emerald-50/90 px-4 py-3 text-sm font-semibold text-emerald-700']) }}
    >
        {{ $status }}
    </div>
@endif
