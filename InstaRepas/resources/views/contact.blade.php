<x-app-layout
    title="Contact InstaRepas | Questions, aide et suggestions"
    description="Contactez InstaRepas pour poser une question, signaler un problème ou partager une suggestion d’amélioration."
    :canonical="route('contact')"
>
    <section class="section-shell">
        <div class="grid gap-6 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)]">
            <div class="page-hero">
                <span class="eyebrow">Contact</span>
                <h1 class="mt-5 text-3xl font-semibold text-slate-900 sm:text-4xl">Une question, un blocage ou une suggestion d’amélioration ?</h1>
                <p class="mt-4 text-lg leading-8 text-slate-600">
                    Écrivez-nous et donnez le plus de contexte possible. Plus votre message est précis, plus la réponse pourra être utile.
                </p>

                <div class="mt-8 space-y-4">
                    <div class="soft-card">
                        <p class="text-sm uppercase tracking-[0.18em] text-emerald-700">Cabinet de diététique</p>
                        <p class="mt-3 text-lg font-semibold text-slate-900">6 rue de plaisance, 94130 Nogent-sur-Marne</p>
                    </div>
                    <div class="soft-card">
                        <p class="text-sm uppercase tracking-[0.18em] text-emerald-700">Téléphone</p>
                        <a href="tel:+33148723595" class="mt-3 block text-lg font-semibold text-slate-900 hover:text-emerald-700">01 48 72 35 95</a>
                    </div>
                </div>
            </div>

            <div class="surface-panel rounded-[2rem] p-6 sm:p-8">
                <div class="space-y-2">
                    <span class="eyebrow">Formulaire</span>
                    <h2 class="text-2xl font-semibold text-slate-900">Envoyez votre message</h2>
                </div>

                @if (session('success'))
                    <div class="mt-6 rounded-[1.5rem] border border-emerald-200 bg-emerald-50 px-4 py-4 text-emerald-700" role="status" aria-live="polite">
                        <strong class="font-semibold">Message envoyé.</strong>
                        <p class="mt-1 text-sm">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="mt-8 space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="field-label">Nom</label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ Auth::user() ? Auth::user()->username : old('name') }}"
                            {{ Auth::user() ? 'readonly' : '' }}
                            class="field-input"
                            autocomplete="name"
                        >
                        @error('name')
                            <span class="mt-2 block text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="field-label">Email</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ Auth::user() ? Auth::user()->email : old('email') }}"
                            {{ Auth::user() ? 'readonly' : '' }}
                            class="field-input"
                            autocomplete="email"
                            spellcheck="false"
                        >
                        @error('email')
                            <span class="mt-2 block text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="subject" class="field-label">Sujet</label>
                        <select id="subject" name="subject" class="field-input">
                            <option value="technical_problem">Problème technique</option>
                            <option value="information">Information</option>
                            <option value="suggestion">Suggestion</option>
                        </select>
                        @error('subject')
                            <span class="mt-2 block text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="field-label">Message</label>
                        <textarea id="message" name="message" rows="6" class="field-input">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="mt-2 block text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="insta-button insta-button--primary w-full sm:w-auto">
                        Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
