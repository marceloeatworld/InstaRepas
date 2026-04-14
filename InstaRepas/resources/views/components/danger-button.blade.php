<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center gap-2 rounded-full bg-red-600 px-5 py-3 text-sm font-semibold text-white shadow-[0_16px_34px_rgba(220,38,38,0.22)] hover:bg-red-500']) }}>
    {{ $slot }}
</button>
