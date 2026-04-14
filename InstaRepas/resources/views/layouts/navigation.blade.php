@php
    $primaryLinks = [
        [
            'label' => 'Menus',
            'href' => route('generate'),
            'active' => request()->routeIs('generate'),
            'icon' => 'fa-utensils',
        ],
        [
            'label' => 'Cuisine',
            'href' => route('CookingAdvice.index'),
            'active' => request()->routeIs('CookingAdvice.index'),
            'icon' => 'fa-lightbulb',
        ],
        [
            'label' => 'Nutrition',
            'href' => route('NutritionInfo.index'),
            'active' => request()->routeIs('NutritionInfo.index'),
            'icon' => 'fa-book-open',
        ],
    ];

    if (Auth::check()) {
        array_unshift(
            $primaryLinks,
            Auth::user()->isAdmin()
                ? [
                    'label' => 'Admin',
                    'href' => route('admin.index'),
                    'active' => request()->routeIs('admin.index'),
                    'icon' => 'fa-gauge-high',
                ]
                : [
                    'label' => 'Dashboard',
                    'href' => route('dashboard'),
                    'active' => request()->routeIs('dashboard'),
                    'icon' => 'fa-gauge-high',
                ]
        );
    }

    $secondaryLinks = [
        [
            'label' => 'Contact',
            'href' => route('contact'),
            'active' => request()->routeIs('contact'),
            'icon' => 'fa-envelope',
        ],
        [
            'label' => 'À propos',
            'href' => url('/a-propos'),
            'active' => request()->is('a-propos'),
            'icon' => 'fa-circle-info',
        ],
        [
            'label' => 'Mentions légales',
            'href' => route('legal'),
            'active' => request()->routeIs('legal'),
            'icon' => 'fa-scale-balanced',
        ],
    ];
@endphp

<nav
    x-data="{ open: false, userMenu: false }"
    class="sticky top-0 z-40 border-b border-slate-200/80 bg-white/92 backdrop-blur-xl"
    itemscope
    itemtype="https://schema.org/SiteNavigationElement"
    aria-label="Navigation principale"
>
    <div class="shell">
        <div class="flex items-center justify-between gap-4 py-4">
            <a href="{{ url('/') }}" class="inline-flex min-w-0 items-center gap-3" aria-label="Retour à l'accueil InstaRepas">
                <div class="rounded-[1.1rem] bg-white p-2 ring-1 ring-slate-900/5">
                    <x-application-logo class="h-12 w-auto" alt="Logo InstaRepas" />
                </div>
                <div class="min-w-0">
                    <p class="font-display text-xl font-semibold leading-none text-slate-900" translate="no">InstaRepas</p>
                    <p class="truncate text-sm text-slate-500">Menus clairs & préférences gardées</p>
                </div>
            </a>

            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-center lg:gap-2">
                @foreach ($primaryLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="site-nav-link {{ $link['active'] ? 'site-nav-link--active' : '' }}"
                        @if ($link['active']) aria-current="page" @endif
                        itemprop="url"
                    >
                        <span itemprop="name">{{ $link['label'] }}</span>
                    </a>
                @endforeach
            </div>

            <div class="hidden lg:flex lg:items-center lg:gap-2">
                @foreach ($secondaryLinks as $link)
                    <a
                        href="{{ $link['href'] }}"
                        class="site-secondary-link {{ $link['active'] ? 'site-secondary-link--active' : '' }}"
                        @if ($link['active']) aria-current="page" @endif
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach

                @auth
                    @php
                        $displayName = Auth::user()->username ?: Auth::user()->name;
                    @endphp

                    <div class="relative ml-1">
                        <button
                            type="button"
                            @click="userMenu = ! userMenu"
                            :aria-expanded="userMenu.toString()"
                            class="inline-flex items-center gap-3 rounded-full bg-white px-3 py-2.5 text-left ring-1 ring-slate-900/6"
                            aria-label="Ouvrir le menu utilisateur"
                        >
                            <span class="inline-flex h-11 w-11 items-center justify-center rounded-full bg-emerald-600 text-sm font-bold text-white">
                                {{ strtoupper(substr($displayName, 0, 2)) }}
                            </span>
                            <span class="min-w-0">
                                <span class="block truncate font-semibold text-slate-900">{{ $displayName }}</span>
                                <span class="block truncate text-sm text-slate-500">{{ Auth::user()->email }}</span>
                            </span>
                            <i class="fas fa-chevron-down text-xs text-slate-400" aria-hidden="true"></i>
                        </button>

                        <div
                            x-cloak
                            x-show="userMenu"
                            x-transition.origin.top.right
                            @click.outside="userMenu = false"
                            class="absolute right-0 mt-3 w-72 overflow-hidden rounded-[1.5rem] border border-slate-200 bg-white shadow-[0_12px_36px_rgba(24,59,58,0.1)]"
                        >
                            <div class="border-b border-slate-100 px-5 py-4">
                                <p class="font-display text-lg font-semibold text-slate-900">{{ $displayName }}</p>
                                <p class="text-sm text-slate-500">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="p-3">
                                <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50 hover:text-slate-900">
                                    <i class="fas fa-user-circle text-slate-400" aria-hidden="true"></i>
                                    <span>Mon profil</span>
                                </a>
                                <a href="{{ route('profile.preferences') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-slate-700 hover:bg-slate-50 hover:text-slate-900">
                                    <i class="fas fa-sliders-h text-slate-400" aria-hidden="true"></i>
                                    <span>Préférences alimentaires</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="mt-1">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center gap-3 rounded-2xl px-4 py-3 text-red-600 hover:bg-red-50">
                                        <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                        <span>Déconnexion</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="insta-button insta-button--ghost">Connexion</a>
                    <a href="{{ route('register') }}" class="insta-button insta-button--primary">Créer un compte</a>
                @endauth
            </div>

            <button
                type="button"
                @click="open = ! open"
                :aria-expanded="open.toString()"
                aria-controls="mobile-menu"
                class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-white text-slate-700 ring-1 ring-slate-900/5 lg:hidden"
                aria-label="Ouvrir le menu mobile"
            >
                <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12M18 6L6 18" />
                </svg>
            </button>
        </div>

        <div x-cloak x-show="open" x-transition id="mobile-menu" class="pb-4 lg:hidden">
            <div class="surface-panel rounded-[1.5rem] p-4">
                @auth
                    @php
                        $displayName = Auth::user()->username ?: Auth::user()->name;
                    @endphp
                    <div class="mb-4 flex items-center gap-4 rounded-[1.5rem] bg-slate-50 px-4 py-4">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-emerald-600 text-sm font-bold text-white">
                            {{ strtoupper(substr($displayName, 0, 2)) }}
                        </span>
                        <div class="min-w-0">
                            <p class="truncate font-semibold text-slate-900">{{ $displayName }}</p>
                            <p class="truncate text-sm text-slate-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                @endauth

                <div class="space-y-2">
                    @foreach ($primaryLinks as $link)
                        <a
                            href="{{ $link['href'] }}"
                            class="flex items-center gap-3 rounded-2xl px-4 py-3 {{ $link['active'] ? 'bg-emerald-50 text-emerald-800' : 'text-slate-700 hover:bg-white' }}"
                            @if ($link['active']) aria-current="page" @endif
                        >
                            <i class="fas {{ $link['icon'] }}" aria-hidden="true"></i>
                            <span>{{ $link['label'] }}</span>
                        </a>
                    @endforeach
                </div>

                <div class="my-4 h-px bg-slate-200"></div>

                <div class="space-y-2">
                    @foreach ($secondaryLinks as $link)
                        <a
                            href="{{ $link['href'] }}"
                            class="flex items-center gap-3 rounded-2xl px-4 py-3 {{ $link['active'] ? 'bg-slate-100 text-slate-900' : 'text-slate-700 hover:bg-white' }}"
                            @if ($link['active']) aria-current="page" @endif
                        >
                            <i class="fas {{ $link['icon'] }}" aria-hidden="true"></i>
                            <span>{{ $link['label'] }}</span>
                        </a>
                    @endforeach
                </div>

                @auth
                    <div class="my-4 h-px bg-slate-200"></div>
                    <div class="space-y-2">
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-slate-700 hover:bg-white">
                            <i class="fas fa-user-circle text-slate-400" aria-hidden="true"></i>
                            <span>Mon profil</span>
                        </a>
                        <a href="{{ route('profile.preferences') }}" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-slate-700 hover:bg-white">
                            <i class="fas fa-sliders-h text-slate-400" aria-hidden="true"></i>
                            <span>Préférences alimentaires</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 rounded-2xl px-4 py-3 text-red-600 hover:bg-red-50">
                                <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                <span>Déconnexion</span>
                            </button>
                        </form>
                    </div>
                @else
                    <div class="my-4 h-px bg-slate-200"></div>
                    <div class="grid gap-3 sm:grid-cols-2">
                        <a href="{{ route('login') }}" class="insta-button insta-button--ghost w-full">Connexion</a>
                        <a href="{{ route('register') }}" class="insta-button insta-button--primary w-full">Créer un compte</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
