<x-app-layout
    title="Mentions légales InstaRepas"
    description="Consultez les mentions légales, les crédits, les ressources et les informations de contact d’InstaRepas."
    :canonical="route('legal')"
>
    <section class="section-shell">
        <div class="mx-auto max-w-4xl">
            <div class="surface-panel rounded-[2rem] p-6 sm:p-8 lg:p-10">
                <span class="eyebrow">Mentions légales</span>
                <h1 class="mt-5 text-3xl font-semibold text-slate-900 sm:text-4xl">Informations générales & sources du projet</h1>

                <div class="mt-8 space-y-8 text-base leading-8 text-slate-600">
                    <section>
                        <h2 class="text-xl font-semibold text-slate-900">Responsable de publication</h2>
                        <p class="mt-2">Cabinet de Diététique</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-slate-900">Adresse</h2>
                        <p class="mt-2">6 rue de plaisance, 94130 Nogent-sur-Marne</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-slate-900">Contact</h2>
                        <p class="mt-2">
                            <a href="{{ route('contact') }}" class="font-semibold text-emerald-700 hover:text-emerald-800">Accéder au formulaire de contact</a>
                        </p>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-slate-900">Crédits & ressources</h2>
                        <ul class="mt-3 space-y-3">
                            <li><a href="https://ciqual.anses.fr/" target="_blank" rel="noopener noreferrer" class="font-semibold text-emerald-700 hover:text-emerald-800">CIQUAL ANSES</a> pour les informations sur la qualité des aliments.</li>
                            <li><a href="https://www.mangerbouger.fr/" target="_blank" rel="noopener noreferrer" class="font-semibold text-emerald-700 hover:text-emerald-800">Manger Bouger</a> pour les références liées aux fruits et légumes de saison.</li>
                            <li><a href="https://www.mrgoodfish.com/" target="_blank" rel="noopener noreferrer" class="font-semibold text-emerald-700 hover:text-emerald-800">Mr.Goodfish</a> pour les informations sur les poissons.</li>
                            <li><a href="https://www.midjourney.com/" target="_blank" rel="noopener noreferrer" class="font-semibold text-emerald-700 hover:text-emerald-800">Midjourney</a> pour certaines images du projet.</li>
                            <li><a href="https://github.com/marceloeatworld/InstaRepas" target="_blank" rel="noopener noreferrer" class="font-semibold text-emerald-700 hover:text-emerald-800">GitHub</a> pour le code source.</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-xl font-semibold text-slate-900">Protection des données personnelles</h2>
                        <p class="mt-2">
                            Les données personnelles fournies à l’inscription, comme le nom d’utilisateur et l’email, sont utilisées uniquement pour la gestion de votre compte. Elles ne sont pas transmises à des tiers. Lors de la suppression du compte, les informations associées ne sont pas conservées au-delà de ce qui est nécessaire au fonctionnement légal et technique du service. Conformément au RGPD et à la réglementation française, vous disposez d’un droit d’accès, de rectification et d’opposition aux données vous concernant.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
