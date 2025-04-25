<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg text-center p-5 shadow-md transition-all duration-500 hover:shadow-lg">
                <h1 class="mb-4 text-2xl md:text-3xl font-extrabold text-blue-600 transform transition-transform duration-500 hover:scale-105">InstaRepas : Un choix adapté à vos préférences alimentaires</h1>
                <div class="border-b-2 border-blue-600 w-24 mx-auto mb-4"></div>
                <p class="text-base sm:text-m text-gray-700 leading-relaxed">
                    Peu importe vos préférences alimentaires, InstaRepas s'adapte à vos choix et crée des repas parfaitement adaptés à votre style de vie. En vous inscrivant, vous pouvez sauvegarder vos préférences et les retrouver à chaque connexion. Fini le temps perdu à refaire constamment vos choix, avec InstaRepas, votre sélection reste à portée de main.
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('generate_meals') }}" method="post" class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-4 py-4 mx-auto max-w-7xl transition-all duration-500 hover:shadow-md" aria-labelledby="meal-generator-title">
                @csrf
                <h2 id="meal-generator-title" class="sr-only">Générateur de repas personnalisés</h2>
                
                <fieldset class="flex flex-col items-center">
                    <legend class="text-xl font-semibold text-blue-600 mb-2 text-center transition-colors duration-500 hover:text-blue-700">Restrictions alimentaires</legend>
                    <div class="flex flex-col md:flex-row flex-wrap justify-center md:space-x-4 mb-4">
                        @foreach ($availableDietaryRestrictions as $restriction)
                            <label class="inline-flex items-center mt-3">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="restrictions[]" value="{{ $restriction->name }}" {{ in_array($restriction->id, $userPreferences) ? 'checked' : '' }} aria-describedby="restriction-desc-{{ $restriction->id }}">
                                <span class="ml-2 text-gray-700 dark:text-gray-200 transition-colors duration-500 hover:text-blue-700">{{ $displayNames[$restriction->name] }}</span>
                                <span id="restriction-desc-{{ $restriction->id }}" class="sr-only">Cochez pour exclure {{ $displayNames[$restriction->name] }} de vos repas</span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="text-xl font-semibold text-blue-600 mb-2 text-center transition-colors duration-500 hover:text-blue-700">Nombre de jours</legend>
                    <div class="mb-4 w-full md:w-1/2 lg:w-1/4 mx-auto">
                        <label for="days-input" class="sr-only">Sélectionnez le nombre de jours</label>
                        <input type="number" id="days-input" name="days" min="1" max="14" value="1" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md transition-all duration-300 hover:border-blue-600" aria-describedby="days-help">
                        <div id="days-help" class="sr-only">Choisissez le nombre de jours pour lesquels vous souhaitez générer des repas</div>
                    </div>
                </fieldset>

                <div class="flex items-center justify-center mt-6">
                    <button id="buttonF" type="submit" class="" aria-label="Générer des repas selon vos préférences">Génerer vos repas journaliers</button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600">
                Si vous souhaitez enregistrer vos préférences, veuillez vous <a href="/register" class="text-blue-600 hover:text-blue-500 underline transition-colors duration-300 hover:text-blue-700" title="Créer un compte InstaRepas">inscrire</a> ou vous <a href="/login" class="text-blue-600 hover:text-blue-500 underline transition-colors duration-300 hover:text-blue-700" title="Se connecter à votre compte">connecter</a>.
            </div>
        </div>
    </div>
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Générateur de repas personnalisés - InstaRepas",
        "description": "Générez des repas adaptés à vos préférences alimentaires et restrictions diététiques avec InstaRepas. Service de planification de repas équilibrés.",
        "mainEntity": {
            "@type": "WebApplication",
            "name": "Générateur de menus InstaRepas",
            "applicationCategory": "LifestyleApplication",
            "operatingSystem": "Web",
            "offers": {
                "@type": "Offer",
                "price": "0",
                "priceCurrency": "EUR"
            }
        },
        "potentialAction": {
            "@type": "UseAction",
            "target": "{{ route('generate_meals') }}"
        }
    }
    </script>
    
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "HowTo",
        "name": "Comment générer un menu personnalisé",
        "description": "Créez facilement des menus adaptés à vos restrictions alimentaires",
        "step": [
            {
                "@type": "HowToStep",
                "name": "Sélectionnez vos restrictions alimentaires",
                "text": "Cochez les options correspondant à vos préférences et restrictions alimentaires"
            },
            {
                "@type": "HowToStep",
                "name": "Choisissez le nombre de jours",
                "text": "Indiquez pour combien de jours vous souhaitez générer des repas"
            },
            {
                "@type": "HowToStep",
                "name": "Générez vos repas",
                "text": "Cliquez sur le bouton pour obtenir vos menus personnalisés"
            }
        ]
    }
    </script>
</x-app-layout>