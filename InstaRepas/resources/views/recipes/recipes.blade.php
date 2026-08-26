<x-app-layout title="Recettes | InstaRepas">
    <section class="section-shell">
        <h1 class="text-3xl font-semibold text-slate-900">Recettes</h1>

        @if ($recipes->isEmpty())
            <p class="mt-4 text-slate-600">Aucune recette pour le moment.</p>
        @else
            <ul class="mt-6 space-y-4">
                @foreach ($recipes as $recipe)
                    <li class="soft-card">
                        <h2 class="text-lg font-semibold text-slate-900">{{ $recipe->title }}</h2>
                        <p class="mt-1 text-sm text-slate-600">{{ $recipe->description }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>
</x-app-layout>
