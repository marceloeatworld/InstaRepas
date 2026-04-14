@props(['href' => null])

@if ($href)
    <a href="{{ $href }}" {{ $attributes->except('href')->merge(['class' => 'insta-button insta-button--accent']) }}>
        {{ $slot }}
    </a>
@else
    <span {{ $attributes->merge(['class' => 'insta-button insta-button--accent']) }}>
        {{ $slot }}
    </span>
@endif
