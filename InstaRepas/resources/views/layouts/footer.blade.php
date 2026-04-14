<footer class="mt-16 border-t border-slate-200 bg-white text-slate-900" itemscope itemtype="https://schema.org/WPFooter">
    <div class="shell py-10 sm:py-12">
        <div class="grid gap-8 lg:grid-cols-[minmax(0,1.2fr)_repeat(3,minmax(0,0.8fr))]">
            <section class="space-y-5">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                    <x-application-logo class="h-14 w-auto" alt="Logo InstaRepas" />
                    <div>
                        <p class="font-display text-2xl font-semibold text-slate-900" translate="no">InstaRepas</p>
                        <p class="text-sm text-slate-500">Repas clairs & organisation simple</p>
                    </div>
                </a>

                <p class="max-w-md text-base leading-7 text-slate-600">
                    Une base simple pour choisir vos repas, gérer vos préférences alimentaires et retrouver des repères utiles au quotidien.
                </p>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('generate') }}" class="insta-button insta-button--accent">Créer un menu</a>
                    <a href="{{ route('contact') }}" class="insta-button insta-button--ghost">Nous contacter</a>
                </div>
            </section>

            <section>
                <h2 class="font-display text-lg font-semibold text-slate-900">Navigation</h2>
                <ul class="mt-4 space-y-3 text-slate-600">
                    <li><a href="{{ url('/') }}" class="site-footer-link">Accueil</a></li>
                    <li><a href="{{ route('generate') }}" class="site-footer-link">Menus</a></li>
                    <li><a href="{{ route('CookingAdvice.index') }}" class="site-footer-link">Cuisine</a></li>
                    <li><a href="{{ route('NutritionInfo.index') }}" class="site-footer-link">Nutrition</a></li>
                </ul>
            </section>

            <section>
                <h2 class="font-display text-lg font-semibold text-slate-900">Ressources</h2>
                <ul class="mt-4 space-y-3 text-slate-600">
                    <li><a href="{{ url('/a-propos') }}" class="site-footer-link">À propos</a></li>
                    <li><a href="{{ route('contact') }}" class="site-footer-link">Contact</a></li>
                    <li><a href="{{ route('legal') }}" class="site-footer-link">Mentions légales</a></li>
                    <li><a href="https://github.com/marceloeatworld/InstaRepas" target="_blank" rel="noopener noreferrer" class="site-footer-link">Code source</a></li>
                </ul>
            </section>

            <section itemscope itemtype="https://schema.org/LocalBusiness">
                <meta itemprop="name" content="Cabinet de Diététique - InstaRepas">
                <meta itemprop="image" content="{{ asset('imgs/logo_for_foodequlibre.webp') }}">

                <h2 class="font-display text-lg font-semibold text-slate-900">Cabinet de diététique</h2>
                <div class="mt-4 space-y-3 text-slate-600">
                    <p itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <span itemprop="streetAddress">6 rue de plaisance</span><br>
                        <span itemprop="postalCode">94130</span>
                        <span itemprop="addressLocality">Nogent-sur-Marne</span>
                    </p>
                    <p>
                        <a href="tel:+33148723595" itemprop="telephone" class="site-footer-link">01 48 72 35 95</a>
                    </p>
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a href="https://www.instagram.com/foodequilibre/" target="_blank" rel="noopener" itemprop="sameAs" class="inline-flex items-center gap-2 site-footer-link">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span>FoodEquilibre</span>
                        </a>
                        <a href="https://www.instagram.com/painetchocolat_asso/" target="_blank" rel="noopener" itemprop="sameAs" class="inline-flex items-center gap-2 site-footer-link">
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <span>Pain et Chocolat</span>
                        </a>
                    </div>
                </div>
            </section>
        </div>

        <div class="mt-10 flex flex-col gap-3 border-t border-slate-200 pt-6 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between">
            <p>© {{ date('Y') }} InstaRepas. Tous droits réservés.</p>
            <p>Conçu pour aider à mieux planifier ses repas, sans complexifier le quotidien.</p>
        </div>
    </div>
</footer>
