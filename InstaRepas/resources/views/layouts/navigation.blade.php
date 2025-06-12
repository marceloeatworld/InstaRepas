<nav x-data="{ open: false }" class="bg-white shadow-lg border-b border-gray-100" itemscope itemtype="https://schema.org/SiteNavigationElement" role="navigation" aria-label="Navigation principale">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="/" title="Accueil InstaRepas" aria-label="Page d'accueil" class="group flex items-center space-x-3">
                        <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-2.5 rounded-2xl shadow-lg group-hover:shadow-xl transform group-hover:scale-105 transition-all duration-300">
                            <x-application-logo class="block h-10 w-auto fill-current text-white" alt="Logo InstaRepas" />
                        </div>
                        <span class="hidden md:block text-2xl font-bold text-gray-800 group-hover:text-green-600 transition-colors duration-200">InstaRepas</span>
                    </a>
                </div>

                <div class="hidden space-x-2 sm:-my-px sm:ml-10 lg:flex items-center">
                    @if (Auth::check())
                        @if(Auth::user()->isAdmin())
                            <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')" itemprop="url" title="Tableau de bord administrateur" 
                                class="flex items-center px-4 py-2.5 rounded-xl hover:bg-green-50 hover:text-green-700 transition-all duration-200 group {{ request()->routeIs('admin.index') ? 'bg-green-50 text-green-700' : 'text-gray-600' }}">
                                <span itemprop="name" class="flex items-center space-x-2.5">
                                    <i class="fas fa-tachometer-alt text-lg {{ request()->routeIs('admin.index') ? 'text-green-600' : 'text-gray-400 group-hover:text-green-600' }} transition-colors" aria-hidden="true"></i>
                                    <span class="font-medium">{{ __('Dashboard Admin') }}</span>
                                </span>
                            </x-nav-link>
                        @else
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" itemprop="url" title="Votre tableau de bord personnel"
                                class="flex items-center px-4 py-2.5 rounded-xl hover:bg-green-50 hover:text-green-700 transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-green-50 text-green-700' : 'text-gray-600' }}">
                                <span itemprop="name" class="flex items-center space-x-2.5">
                                    <i class="fas fa-tachometer-alt text-lg {{ request()->routeIs('dashboard') ? 'text-green-600' : 'text-gray-400 group-hover:text-green-600' }} transition-colors" aria-hidden="true"></i>
                                    <span class="font-medium">{{ __('Dashboard') }}</span>
                                </span>
                            </x-nav-link>
                        @endif
                    @endif
       
                    <x-nav-link :href="route('generate')" :active="request()->routeIs('generate')" itemprop="url" title="Générer vos menus équilibrés personnalisés"
                        class="flex items-center px-4 py-2.5 rounded-xl hover:bg-green-50 hover:text-green-700 transition-all duration-200 group relative {{ request()->routeIs('generate') ? 'bg-green-50 text-green-700' : 'text-gray-600' }}">
                        <span itemprop="name" class="flex items-center space-x-2.5">
                            <i class="fas fa-utensils text-lg {{ request()->routeIs('generate') ? 'text-green-600' : 'text-gray-400 group-hover:text-green-600' }} transition-colors" aria-hidden="true"></i>
                            <span class="font-medium">{{ __('Menu Équilibré') }}</span>
                        </span>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full font-semibold shadow-sm">NEW</span>
                    </x-nav-link>

                    <x-nav-link :href="'/conseil-de-cuisine'" itemprop="url" title="Découvrez nos conseils et astuces de cuisine"
                        class="flex items-center px-4 py-2.5 rounded-xl hover:bg-green-50 hover:text-green-700 transition-all duration-200 group {{ request()->is('conseil-de-cuisine') ? 'bg-green-50 text-green-700' : 'text-gray-600' }}">
                        <span itemprop="name" class="flex items-center space-x-2.5">
                            <i class="fas fa-lightbulb text-lg {{ request()->is('conseil-de-cuisine') ? 'text-yellow-500' : 'text-gray-400 group-hover:text-yellow-500' }} transition-colors" aria-hidden="true"></i>
                            <span class="font-medium">{{ __('Astuces Culinaires') }}</span>
                        </span>
                    </x-nav-link>

                    <x-nav-link :href="'/information-nutrition'" itemprop="url" title="Guide complet sur la nutrition et l'alimentation équilibrée"
                        class="flex items-center px-4 py-2.5 rounded-xl hover:bg-green-50 hover:text-green-700 transition-all duration-200 group {{ request()->is('information-nutrition') ? 'bg-green-50 text-green-700' : 'text-gray-600' }}">
                        <span itemprop="name" class="flex items-center space-x-2.5">
                            <i class="fas fa-book-open text-lg {{ request()->is('information-nutrition') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} transition-colors" aria-hidden="true"></i>
                            <span class="font-medium">{{ __('Guide Nutrition') }}</span>
                        </span>
                    </x-nav-link>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <div class="hidden lg:flex items-center space-x-3">
                    @guest
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" itemprop="url" title="Connexion à votre compte"
                            class="flex items-center px-5 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl hover:from-green-600 hover:to-emerald-700 shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            <i class="fas fa-user mr-2" aria-hidden="true"></i>
                            <span itemprop="name">{{ __('Connexion') }}</span>
                        </x-nav-link>
                    @endguest

                    <x-nav-link :href="'/contact'" itemprop="url" title="Contactez-nous"
                        class="flex items-center justify-center w-11 h-11 rounded-full bg-gray-100 hover:bg-green-100 transition-all duration-200 group">
                        <span itemprop="name">
                            <i class="fas fa-envelope text-gray-500 group-hover:text-green-600 transition-colors" aria-hidden="true"></i>
                            <span class="sr-only">Contact</span>
                        </span>
                    </x-nav-link>

                    <x-nav-link :href="'/a-propos'" itemprop="url" title="À propos d'InstaRepas"
                        class="flex items-center justify-center w-11 h-11 rounded-full bg-gray-100 hover:bg-green-100 transition-all duration-200 group">
                        <span itemprop="name">
                            <i class="fas fa-info-circle text-gray-500 group-hover:text-green-600 transition-colors" aria-hidden="true"></i>
                            <span class="sr-only">À propos</span>
                        </span>
                    </x-nav-link>
                </div>

                @if (Auth::user())
                <div class="hidden sm:flex sm:items-center">
                    <x-dropdown align="right" width="72">
                        <x-slot name="trigger">
                            <button class="flex items-center px-4 py-2.5 bg-gray-50 hover:bg-gray-100 rounded-xl transition-all duration-200 group" aria-label="Menu utilisateur">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold shadow-inner">
                                        {{ strtoupper(substr(Auth::user()->username, 0, 2)) }}
                                    </div>
                                    <div class="text-gray-700 font-medium">{{ Auth::user()->username }}</div>
                                    <svg class="fill-current h-4 w-4 text-gray-400 group-hover:text-gray-600 transition-colors ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="py-2">
                                <x-dropdown-link :href="route('profile.edit')" title="Modifier votre profil"
                                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-green-700 transition-colors group">
                                    <i class="fas fa-user-circle text-gray-400 group-hover:text-green-600 mr-3 text-lg transition-colors" aria-hidden="true"></i>
                                    <span>{{ __('Mon Profil') }}</span>
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('profile.preferences')" title="Gérer vos préférences alimentaires"
                                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-green-700 transition-colors group">
                                    <i class="fas fa-sliders-h text-gray-400 group-hover:text-green-600 mr-3 text-lg transition-colors" aria-hidden="true"></i>
                                    <span>{{ __('Préférences alimentaires') }}</span>
                                </x-dropdown-link>

                                <hr class="my-2 border-gray-200">

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();" title="Se déconnecter"
                                            class="flex items-center px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-700 transition-colors group">
                                        <i class="fas fa-sign-out-alt text-gray-400 group-hover:text-red-600 mr-3 text-lg transition-colors" aria-hidden="true"></i>
                                        <span>{{ __('Déconnexion') }}</span>
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
                @endif

                <div class="flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-3 rounded-xl text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-700 transition-all duration-200" aria-expanded="false" aria-controls="mobile-menu" aria-label="Menu mobile">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100" id="mobile-menu">
        <div class="pt-4 pb-3 space-y-1 px-4">
            @if (Auth::check()) 
                @if(Auth::user()->isAdmin()) 
                    <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')" title="Tableau de bord administrateur"
                        class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.index') ? 'bg-green-50 text-green-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors">
                        <i class="fas fa-tachometer-alt mr-3 text-lg {{ request()->routeIs('admin.index') ? 'text-green-600' : 'text-gray-400' }}" aria-hidden="true"></i>
                        <span>{{ __('Dashboard Admin') }}</span>
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" title="Votre tableau de bord personnel"
                        class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-green-50 text-green-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors">
                        <i class="fas fa-tachometer-alt mr-3 text-lg {{ request()->routeIs('dashboard') ? 'text-green-600' : 'text-gray-400' }}" aria-hidden="true"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </x-responsive-nav-link>
                @endif
            @endif

            <x-responsive-nav-link :href="route('generate')" :active="request()->routeIs('generate')" title="Générer vos menus équilibrés personnalisés"
                class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('generate') ? 'bg-green-50 text-green-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors relative">
                <i class="fas fa-utensils mr-3 text-lg {{ request()->routeIs('generate') ? 'text-green-600' : 'text-gray-400' }}" aria-hidden="true"></i>
                <span>{{ __('Menu Équilibré') }}</span>
                <span class="absolute top-2 right-4 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full font-semibold">NEW</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="'/conseil-de-cuisine'" title="Découvrez nos conseils et astuces de cuisine"
                class="flex items-center px-4 py-3 rounded-xl {{ request()->is('conseil-de-cuisine') ? 'bg-green-50 text-green-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors">
                <i class="fas fa-lightbulb mr-3 text-lg {{ request()->is('conseil-de-cuisine') ? 'text-yellow-500' : 'text-gray-400' }}" aria-hidden="true"></i>
                <span>{{ __('Astuces Culinaires') }}</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="'/information-nutrition'" title="Guide complet sur la nutrition et l'alimentation équilibrée"
                class="flex items-center px-4 py-3 rounded-xl {{ request()->is('information-nutrition') ? 'bg-green-50 text-green-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors">
                <i class="fas fa-book-open mr-3 text-lg {{ request()->is('information-nutrition') ? 'text-blue-600' : 'text-gray-400' }}" aria-hidden="true"></i>
                <span>{{ __('Guide Nutrition') }}</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="'/contact'" title="Contactez-nous"
                class="flex items-center px-4 py-3 rounded-xl {{ request()->is('contact') ? 'bg-green-50 text-green-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors">
                <i class="fas fa-envelope mr-3 text-lg text-gray-400" aria-hidden="true"></i>
                <span>{{ __('Contact') }}</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="'/a-propos'" title="À propos d'InstaRepas"
                class="flex items-center px-4 py-3 rounded-xl {{ request()->is('a-propos') ? 'bg-green-50 text-green-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors">
                <i class="fas fa-info-circle mr-3 text-lg text-gray-400" aria-hidden="true"></i>
                <span>{{ __('À propos') }}</span>
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-3 border-t border-gray-200 bg-gray-50">
            <div class="px-6 mb-4">
                @if (Auth::user())
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md">
                        {{ strtoupper(substr(Auth::user()->username, 0, 2)) }}
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                        <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                @endif
            </div>

            <div class="space-y-1 px-4">
                @if (Auth::user())
                <x-responsive-nav-link :href="route('profile.edit')" title="Modifier votre profil"
                    class="flex items-center px-4 py-3 rounded-xl text-gray-600 hover:bg-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-user-circle mr-3 text-lg text-gray-400" aria-hidden="true"></i>
                    <span>{{ __('Mon Profil') }}</span>
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('profile.preferences')" title="Gérer vos préférences alimentaires"
                    class="flex items-center px-4 py-3 rounded-xl text-gray-600 hover:bg-white hover:text-gray-900 transition-colors">
                    <i class="fas fa-sliders-h mr-3 text-lg text-gray-400" aria-hidden="true"></i>
                    <span>{{ __('Préférences alimentaires') }}</span>
                </x-responsive-nav-link>
                @endif

                @guest
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" title="Connexion à votre compte"
                    class="flex items-center px-4 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-xl shadow-md mx-2 my-3">
                    <i class="fas fa-user mr-3" aria-hidden="true"></i>
                    <span>{{ __('Connexion') }}</span>
                </x-responsive-nav-link>
                @endguest

                @if (Auth::check())
                <form method="POST" action="{{ route('logout') }}" class="mt-3 px-2">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" title="Se déconnecter"
                        class="flex items-center px-4 py-3 rounded-xl bg-red-50 text-red-700 hover:bg-red-100 transition-colors">
                        <i class="fas fa-sign-out-alt mr-3 text-lg text-red-600" aria-hidden="true"></i>
                        <span>{{ __('Déconnexion') }}</span>
                    </x-responsive-nav-link>
                </form>
                @endif
            </div>
        </div>
    </div>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "SiteNavigationElement",
      "name": [
        "Menu Équilibré",
        "Astuces Culinaires",
        "Guide Nutrition",
        "Contact",
        "À propos"
      ],
      "url": [
        "{{ route('generate') }}",
        "/conseil-de-cuisine",
        "/information-nutrition",
        "/contact",
        "/a-propos"
      ]
    }
    </script>
</nav>