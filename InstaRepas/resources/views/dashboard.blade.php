<x-app-layout>
    <section class="section-shell">
        <div class="page-hero">
            <div class="grid gap-8 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)] lg:items-center">
                <div class="space-y-5">
                    <span class="eyebrow">Dashboard</span>
                    <h1 class="section-title">Bienvenue dans votre espace personnel.</h1>
                    <p class="section-copy">
                        Vos préférences sont sauvegardées, vos prochaines générations seront plus rapides et vous avez désormais une base plus stable pour organiser vos repas.
                    </p>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('generate') }}" class="insta-button insta-button--primary">Générer un menu</a>
                        <a href="{{ route('profile.preferences') }}" class="insta-button insta-button--ghost">Modifier mes préférences</a>
                    </div>
                </div>

                <div class="soft-card">
                    <p class="text-sm uppercase tracking-[0.2em] text-emerald-700">Ce qui change pour vous</p>
                    <ul class="mt-5 space-y-4 text-slate-600">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle mt-1 text-emerald-600" aria-hidden="true"></i>
                            <span>Vos restrictions et préférences évitent les reparamétrages répétitifs.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle mt-1 text-emerald-600" aria-hidden="true"></i>
                            <span>Le générateur sert de point de départ clair quand les idées manquent.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check-circle mt-1 text-emerald-600" aria-hidden="true"></i>
                            <span>Le parcours du site est recentré sur les actions les plus utiles.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shell pt-0">
        <div class="grid gap-6 lg:grid-cols-3">
            <article class="soft-card">
                <span class="eyebrow">Action rapide</span>
                <h2 class="mt-5 text-2xl font-semibold text-slate-900">Lancer une génération</h2>
                <p class="mt-3 text-slate-600">Choisissez vos contraintes, indiquez la durée et obtenez un cadre repas plus rapide à exploiter.</p>
                <a href="{{ route('generate') }}" class="insta-button insta-button--primary mt-6">Créer un menu</a>
            </article>

            <article class="soft-card">
                <span class="eyebrow">Préférences</span>
                <h2 class="mt-5 text-2xl font-semibold text-slate-900">Affiner vos choix</h2>
                <p class="mt-3 text-slate-600">Ajustez vos restrictions alimentaires pour rendre les prochaines propositions plus pertinentes.</p>
                <a href="{{ route('profile.preferences') }}" class="insta-button insta-button--ghost mt-6">Ouvrir les préférences</a>
            </article>

            <article class="soft-card">
                <span class="eyebrow">Profil</span>
                <h2 class="mt-5 text-2xl font-semibold text-slate-900">Mettre à jour votre espace</h2>
                <p class="mt-3 text-slate-600">Gardez vos informations à jour pour conserver un parcours plus fluide et mieux personnalisé.</p>
                <a href="{{ route('profile.edit') }}" class="insta-button insta-button--ghost mt-6">Modifier mon profil</a>
            </article>
        </div>
    </section>
</x-app-layout>
