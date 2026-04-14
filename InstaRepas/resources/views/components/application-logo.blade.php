@props(['alt' => 'Logo InstaRepas'])

<svg
    viewBox="0 0 96 96"
    fill="none"
    role="img"
    aria-label="{{ $alt }}"
    {{ $attributes->except('alt')->merge(['class' => 'h-16 w-16']) }}
>
    <rect x="6" y="6" width="84" height="84" rx="24" fill="#FFFDF8" />
    <rect x="6.5" y="6.5" width="83" height="83" rx="23.5" stroke="#E4EEE8" />
    <circle cx="48" cy="48" r="25" fill="white" stroke="#E7EFEB" stroke-width="2" />
    <path d="M48 30C54.5 35.2 55.5 44.3 50.4 50.8C43.8 49.1 40.6 40.8 43.8 34.8C44.8 33 46.2 31.4 48 30Z" fill="#1F8A70" />
    <path d="M37.5 42.5C43.9 41.5 49.1 46.1 48.8 53C42.1 54.9 35.2 51.5 32.8 45.8C33.7 44.1 35.4 42.8 37.5 42.5Z" fill="#78C8A0" />
    <path d="M60.4 37.4C65.3 39.7 67.8 45.7 65.2 51.4C59.5 52.2 54.5 48.6 53.7 42.8C54.8 39.8 57.2 37.9 60.4 37.4Z" fill="#F4B942" />
    <path d="M47.9 51.2V65.5" stroke="#183B3A" stroke-width="3" stroke-linecap="round" />
    <path d="M42.7 65.6H53.1" stroke="#183B3A" stroke-width="3" stroke-linecap="round" />
</svg>
