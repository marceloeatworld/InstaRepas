<button {{ $attributes->merge(['type' => 'submit', 'class' => 'insta-button insta-button--primary']) }}>
    {{ $slot }}
</button>
