<nav x-data="{ open: false }" class="bg-white border-b border-gray-100" itemscope itemtype="https://schema.org/SiteNavigationElement" role="navigation" aria-label="Navigation principale">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
        <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="/" title="Accueil InstaRepas" aria-label="Page d'accueil">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" alt="Logo InstaRepas" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <!-- Si l'utilisateur est connecté -->
                    @if (Auth::check())
                       <!-- Si l'utilisateur est un administrateur -->
                       @if(Auth::user()->isAdmin())
                        <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')" itemprop="url" title="Tableau de bord administrateur">
                            <span itemprop="name"><i class="fas fa-tachometer-alt" aria-hidden="true"></i> {{ __('Dashboard Admin') }}</span>
                        </x-nav-link>
                    @else
                        <!-- L'utilisateur est connecté mais n'est pas un administrateur -->
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" itemprop="url" title="Votre tableau de bord personnel">
                            <span itemprop="name"><i class="fas fa-tachometer-alt" aria-hidden="true"></i> {{ __('Dashboard') }}</span>
                        </x-nav-link>
                        @endif
                    @endif
       
                <x-nav-link :href="route('generate')" :active="request()->routeIs('generate')" itemprop="url" title="Générer vos menus équilibrés personnalisés">
                    <span itemprop="name">{{ __('Menu Équilibre') }}</span>
                </x-nav-link>

                <!--<x-nav-link :href="route('recipes.create')" :active="request()->routeIs('recipes.create')">
                    <i class="fas fa-utensils"></i> {{ __('Créer une recette') }}
                </x-nav-link> -->

                <x-nav-link :href="'/conseil-de-cuisine'" itemprop="url" title="Découvrez nos conseils et astuces de cuisine">
                  <span itemprop="name">{{ __('Astuces Culinaire') }}</span>
                </x-nav-link>

                <x-nav-link :href="'/information-nutrition'" itemprop="url" title="Guide complet sur la nutrition et l'alimentation équilibrée">
                   <span itemprop="name">{{ __('Guide Nutrition') }}</span>
                </x-nav-link>

                <div class="flex justify-end space-x-4">
                <!-- L'utilisateur n'est pas connecté -->
                @guest
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')" itemprop="url" title="Connexion à votre compte">
                        <i class="fas fa-user" aria-hidden="true"></i>
                        <span itemprop="name">{{ __('Login') }}</span>
                    </x-nav-link>
                @endguest

                <x-nav-link :href="'/contact'" itemprop="url" title="Contactez-nous">
                    <span itemprop="name"><i class="fas fa-envelope" aria-hidden="true"></i><span class="sr-only">Contact</span></span>
                </x-nav-link>

                <x-nav-link :href="'/a-propos'" itemprop="url" title="À propos d'InstaRepas">
                    <span itemprop="name"><i class="fas fa-info-circle" aria-hidden="true"></i><span class="sr-only">À propos</span></span>
                </x-nav-link>
            </div>
        </div>
    </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Auth::user())
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150" aria-label="Menu utilisateur">
                            <div>{{ Auth::user()->username }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')" title="Modifier votre profil">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('profile.preferences')" title="Gérer vos préférences alimentaires">
                        {{ __('Préférences alimentaires') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" title="Se déconnecter">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" aria-expanded="false" aria-controls="mobile-menu" aria-label="Menu mobile">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" id="mobile-menu">
    <div class="pt-2 pb-3 space-y-1">
        @if (Auth::check()) <!-- Vérifie si un utilisateur est connecté -->
        @if(Auth::user()->isAdmin()) <!-- Vérifie si c'est un admin -->
            <x-responsive-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')" title="Tableau de bord administrateur">
                <i class="fas fa-tachometer-alt" aria-hidden="true"></i> {{ __('Dashboard Admin') }}
            </x-responsive-nav-link>
        @else
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" title="Votre tableau de bord personnel">
            <i class="fas fa-tachometer-alt" aria-hidden="true"></i>  {{ __('Dashboard') }}
            </x-responsive-nav-link>
        @endif
        @endif

        <x-responsive-nav-link :href="route('generate')" :active="request()->routeIs('generate')" title="Générer vos menus équilibrés personnalisés">
            {{ __('Menu Équilibre') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="'/conseil-de-cuisine'" title="Découvrez nos conseils et astuces de cuisine">
            {{ __('Astuces Culinaire') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="'/information-nutrition'" title="Guide complet sur la nutrition et l'alimentation équilibrée">
            {{ __('Guide Nutrition') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="'/contact'" title="Contactez-nous">
            {{ __('Contact') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="'/a-propos'" title="À propos d'InstaRepas">
            {{ __('À propos') }}
        </x-responsive-nav-link>
    </div>

   <!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200">
    <div class="px-4">
        <!-- User Info -->
        @if (Auth::user())
        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        @endif
    </div>

    <div class="mt-3 space-y-1">
        <!-- Profile and Preferences -->
        @if (Auth::user())
        <x-responsive-nav-link :href="route('profile.edit')" title="Modifier votre profil">
            <i class="fas fa-user-circle" aria-hidden="true"></i> {{ __('Profile') }}
        </x-responsive-nav-link>
        <x-dropdown-link :href="route('profile.preferences')" title="Gérer vos préférences alimentaires">
            <i class="fas fa-utensils" aria-hidden="true"></i> {{ __('Préférences alimentaires') }}
        </x-dropdown-link>
        @endif

        <!-- Guest User -->
        @guest
        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" title="Connexion à votre compte">
            <i class="fas fa-user" aria-hidden="true"></i> <span>{{ __('Login') }}</span>
        </x-nav-link>
        @endguest

        <!-- Logout -->
        @if (Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" title="Se déconnecter">
                <i class="fas fa-sign-out-alt" aria-hidden="true"></i> {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
        @endif
    </div>
</div>

</div>

<!-- Structured Data for Main Navigation -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SiteNavigationElement",
  "name": [
    "Menu Équilibre",
    "Astuces Culinaire",
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