@props(['alt' => 'Logo InstaRepas'])

<img
    src="/imgs/logo_for_foodequlibre.webp"
    alt="{{ $alt }}"
    width="96"
    height="96"
    {{ $attributes->except('alt')->merge(['class' => 'h-16 w-auto']) }}
>
