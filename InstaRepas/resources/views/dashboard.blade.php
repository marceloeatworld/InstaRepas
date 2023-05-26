<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
                    <p class="font-bold">
                        {{ __("You're logged in!") }}
                    </p>
                    <p>Vous pouvez désormais sauvegarder vos préférences alimentaires.</p>
                    <p>Bientôt, découvrez de nouvelles recettes adaptées à vos goûts.</p>
                </div>
            </div>
        </div>
        <div class="p-6 max-w-3xl mx-auto mt-8 bg-white rounded-xl shadow-md flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
            <div class="w-full md:w-auto">
                <img src="imgs/test.webp" alt="Food" class="h-auto object-cover rounded w-full">
            </div>

            <div>
                <div class="text-xl font-medium text-black">Nouvelle fonctionnalité à venir</div>
                <br>
                <p class="text-gray-500">
                    Nous développons actuellement une fonctionnalité de création de recettes. <br>Cela vous permettra d'exprimer votre créativité et de partager vos compétences culinaires. <br>En tant qu'équipe de bénévoles, nous vous remercions pour votre patience. <br><br>Restez à l'écoute pour les mises à jour !
                </p>

                <p class="text-lg text-gray-800 font-semibold mt-4 text-center">
                    Préparé avec 💚 par <br>
                    <span class="text-green-500">Food Équilibre 🥗</span>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
