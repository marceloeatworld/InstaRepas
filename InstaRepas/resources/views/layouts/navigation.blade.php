<nav x-data="{ open: false, darkMode: false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode') || 'false'); $watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="darkMode ? 'dark' : ''" class="fixed w-full top-0 z-50 bg-white dark:bg-gray-800 backdrop-blur-md bg-opacity-70 dark:bg-opacity-70 shadow-md transition-colors duration-300">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">
      <div class="flex-shrink-0">
        <a href="/" aria-label="Accueil InstaRepas">
          <x-application-logo class="h-8 w-auto text-gray-800 dark:text-white" alt="Logo InstaRepas" />
        </a>
      </div>

      <div class="hidden sm:flex sm:space-x-6">
        @if(Auth::check())
          @if(Auth::user()->isAdmin())
            <x-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">
              <i class="fas fa-tachometer-alt"></i> Dashboard Admin
            </x-nav-link>
          @else
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
              <i class="fas fa-tachometer-alt"></i> Dashboard
            </x-nav-link>
          @endif
        @endif
        <x-nav-link href="{{ route('generate') }}" :active="request()->routeIs('generate')">Menu Équilibre</x-nav-link>
        <x-nav-link href="/conseil-de-cuisine">Astuces Culinaire</x-nav-link>
        <x-nav-link href="/information-nutrition">Guide Nutrition</x-nav-link>
        <x-nav-link href="/contact"><i class="fas fa-envelope"></i> </x-nav-link>
        <x-nav-link href="/a-propos"><i class="fas fa-info-circle"></i></x-nav-link>
      </div>

      <div class="flex items-center space-x-4">
        <button @click="darkMode = !darkMode" aria-label="Toggle Dark Mode" class="focus:outline-none">
          <template x-if="!darkMode">
            <i class="fas fa-moon text-gray-600 dark:text-gray-300"></i>
          </template>
          <template x-if="darkMode">
            <i class="fas fa-sun text-yellow-400"></i>
          </template>
        </button>

        @guest
          <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
            <i class="fas fa-user"></i> Connexion
          </x-nav-link>
        @else
          <div @mouseenter="open = true" @mouseleave="open = false" class="relative">
            <button class="flex items-center space-x-2 focus:outline-none">
              <img src="{{ Auth::user()->avatar_url ?? '/images/default-avatar.png' }}" alt="Avatar" class="h-8 w-8 rounded-full">
              <span class="text-gray-800 dark:text-gray-200">{{ Auth::user()->username }}</span>
              <i class="fas fa-chevron-down text-gray-600 dark:text-gray-300"></i>
            </button>
            <div x-show="open" x-transition class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5">
              <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">Profil</a>
              <a href="{{ route('profile.preferences') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">Préférences</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">Déconnexion</button>
              </form>
            </div>
          </div>
        @endguest

        <button @click="open = !open" class="sm:hidden inline-flex items-center justify-center p-2 rounded-md focus:outline-none">
          <svg :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg :class="{'hidden': !open, 'inline-flex': open }" class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <div x-show="open" x-transition class="sm:hidden bg-white dark:bg-gray-800 backdrop-blur-md bg-opacity-90 dark:bg-opacity-90">
    <div class="px-2 pt-2 pb-3 space-y-1">
      @if(Auth::check())
        @if(Auth::user()->isAdmin())
          <x-responsive-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Dashboard Admin</x-responsive-nav-link>
        @else
          <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">Dashboard</x-responsive-nav-link>
        @endif
      @endif
      <x-responsive-nav-link href="{{ route('generate') }}" :active="request()->routeIs('generate')">Menu Équilibre</x-responsive-nav-link>
      <x-responsive-nav-link href="/conseil-de-cuisine">Astuces Culinaire</x-responsive-nav-link>
      <x-responsive-nav-link href="/information-nutrition">Guide Nutrition</x-responsive-nav-link>
      <x-responsive-nav-link href="/contact">Contact</x-responsive-nav-link>
      <x-responsive-nav-link href="/a-propos">À propos</x-responsive-nav-link>
      @guest
        <x-responsive-nav-link href="{{ route('login') }}">Connexion</x-responsive-nav-link>
      @endguest
    </div>
  </div>
</nav>
