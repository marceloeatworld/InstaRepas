<x-app-layout
    title="À propos d’InstaRepas | Nutrition simple et accompagnement"
    description="Découvrez l’approche InstaRepas, ses partenaires et les initiatives qui soutiennent une alimentation plus simple au quotidien."
    :canonical="route('about')"
    robots="index, follow, max-image-preview:large"
>
    <section class="section-shell">
        <div class="page-hero">
            <span class="eyebrow">À propos</span>
            <h1 class="mt-5 text-3xl font-semibold text-slate-900 sm:text-5xl">InstaRepas s’appuie sur un réseau simple: accompagnement nutritionnel, partage d’idées & pédagogie.</h1>
            <p class="mt-4 max-w-3xl text-lg leading-8 text-slate-600">
                Cette page rassemble les partenaires et initiatives liés au projet, avec une présentation plus claire et des liens plus faciles à parcourir.
            </p>
        </div>
    </section>

    <section class="section-shell pt-0">
        <div class="grid gap-6">
            <article class="surface-panel overflow-hidden rounded-[2rem] p-6 sm:p-8" itemscope itemtype="https://schema.org/MedicalBusiness">
                <div class="grid gap-8 lg:grid-cols-[minmax(0,0.85fr)_minmax(0,1.15fr)] lg:items-center">
                    <div class="overflow-hidden rounded-[1.75rem]">
                        <a href="https://www.dieteticienne-nogent.com/" target="_blank" rel="noopener" title="Visiter le site du cabinet">
                            <img
                                src="https://image.jimcdn.com/app/cms/image/transf/dimension=205x1024:format=jpg/path/s9a157b55c9b06dff/image/i055dd318db0ca89a/version/1653432195/image.jpg"
                                alt="Cabinet de diététique Aurélie Marino à Nogent-sur-Marne"
                                width="500"
                                height="350"
                                loading="lazy"
                                class="h-full w-full object-cover"
                                itemprop="image"
                            >
                        </a>
                    </div>

                    <div>
                        <span class="eyebrow">Cabinet partenaire</span>
                        <h2 class="mt-5 text-3xl font-semibold text-slate-900">Cabinet de diététique Aurélie Marino</h2>
                        <p class="mt-4 text-lg leading-8 text-slate-600" itemprop="description">
                            Diététicienne-gastronome diplômée, Aurélie Marino accompagne le projet InstaRepas avec une approche tournée vers l’équilibre alimentaire gourmand, concret et accessible.
                        </p>
                        <div class="mt-6 space-y-2 text-slate-600" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                            <p><strong class="text-slate-900">Adresse :</strong> <span itemprop="streetAddress">6 rue de plaisance</span>, <span itemprop="postalCode">94130</span> <span itemprop="addressLocality">Nogent-sur-Marne</span></p>
                            <p><strong class="text-slate-900">Téléphone :</strong> <a href="tel:+33148723595" itemprop="telephone" class="hover:text-emerald-700">01 48 72 35 95</a></p>
                        </div>
                        <a href="https://www.dieteticienne-nogent.com/" target="_blank" rel="noopener" class="insta-button insta-button--primary mt-6">
                            Visiter le site
                        </a>
                    </div>
                </div>
            </article>

            <article class="surface-panel overflow-hidden rounded-[2rem] p-6 sm:p-8" itemscope itemtype="https://schema.org/Organization">
                <div class="grid gap-8 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)] lg:items-center">
                    <div>
                        <span class="eyebrow">Communauté</span>
                        <h2 class="mt-5 text-3xl font-semibold text-slate-900">FoodEquilibre sur Instagram</h2>
                        <p class="mt-4 text-lg leading-8 text-slate-600" itemprop="description">
                            FoodEquilibre partage au quotidien des idées de recettes, de préparation et de nutrition dans une logique simple: rendre l’équilibre alimentaire plus concret et plus inspirant.
                        </p>
                        <a href="https://www.instagram.com/foodequilibre/" target="_blank" rel="noopener" itemprop="sameAs" class="insta-button insta-button--accent mt-6">
                            Suivre le compte
                        </a>
                    </div>

                    <div class="overflow-hidden rounded-[1.75rem] bg-slate-100">
                        <img
                            src="{{ asset('imgs/foodequilibre.webp') }}"
                            alt="Visuel FoodEquilibre"
                            width="500"
                            height="500"
                            loading="lazy"
                            class="h-full w-full object-cover"
                            itemprop="image"
                        >
                    </div>
                </div>
            </article>

            <article class="surface-panel overflow-hidden rounded-[2rem] p-6 sm:p-8" itemscope itemtype="https://schema.org/NGO">
                <div class="grid gap-8 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] lg:items-center">
                    <div class="overflow-hidden rounded-[1.75rem]">
                        <a href="https://www.pain-et-chocolat.org/" target="_blank" rel="noopener" title="Visiter le site de Pain et Chocolat">
                            <img
                                src="https://static.wixstatic.com/media/b0b7e0_53aebc87071e406eaffa0cb1c60a0570~mv2.jpg/v1/fit/w_1164,h_789,q_90/b0b7e0_53aebc87071e406eaffa0cb1c60a0570~mv2.webp"
                                alt="Atelier cuisine pour enfants de l’association Pain et Chocolat"
                                width="500"
                                height="400"
                                loading="lazy"
                                class="h-full w-full object-cover"
                                itemprop="image"
                            >
                        </a>
                    </div>

                    <div>
                        <span class="eyebrow">Engagement</span>
                        <h2 class="mt-5 text-3xl font-semibold text-slate-900">Association Pain et Chocolat</h2>
                        <p class="mt-4 text-lg leading-8 text-slate-600" itemprop="description">
                            Cette association sensibilise les enfants à l’alimentation par des ateliers ludiques et éducatifs. Elle incarne une vision très concrète de la transmission des bonnes habitudes.
                        </p>
                        <a href="https://www.pain-et-chocolat.org/" target="_blank" rel="noopener" itemprop="sameAs" class="insta-button insta-button--primary mt-6">
                            Découvrir l’association
                        </a>
                    </div>
                </div>
            </article>
        </div>

        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "InstaRepas",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('imgs/logo_for_foodequlibre.webp') }}"
        }
        </script>
    </section>
</x-app-layout>
