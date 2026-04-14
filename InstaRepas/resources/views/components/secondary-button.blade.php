<button {{ $attributes->merge(['type' => 'button', 'class' => 'insta-button insta-button--ghost']) }}>
    {{ $slot }}
</button>
