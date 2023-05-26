<x-app-layout>
    <div class="flex justify-center py-6">
        <div class="w-full sm:w-4/5 md:w-3/5 lg:w-2/5 xl:w-1/3">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">Mentions légales</h1>
                <div class="space-y-6 text-gray-700 leading-relaxed">
                    <p><strong class="font-bold">Responsable de publication :</strong> Cabinet de Diététique</p>
                    <p><strong class="font-bold">Adresse :</strong> 6 rue de plaisance, 94130 Nogent sur Marne</p>
                    <p><strong class="font-bold">Contact :</strong> <a href="{{ route('contact') }}" class="text-blue-500 hover:text-blue-700 font-bold">Contactez-nous</a></p>
                    <p><strong class="font-bold">Crédits :</strong></p>
                    <ul class="list-disc ml-5">
                        <li><a href="https://ciqual.anses.fr/" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:text-blue-700 font-bold">Cliqual ANSES</a> pour les informations sur la qualité des aliments</li>
                        <li><a href="https://www.mangerbouger.fr/" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:text-blue-700 font-bold">Data.gouv.fr</a> pour les informations sur les fruits et légumes de saison</li>
                        <li><a href="https://www.mrgoodfish.com/" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:text-blue-700 font-bold">Mr.Goodfish</a> pour les informations sur les poissons</li>
                        <li><a href="https://www.midjourney.com/" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:text-blue-700 font-bold">Midjourney</a> pour les images</li>
                        <li><a href="https://github.com/marceloeatworld/InstaRepas" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:text-blue-700 font-bold">Code-Source</a> : Consultez le code source du projet sur GitHub</li>
                    </ul>
                    <p><strong class="font-bold">Protection des données personnelles :</strong> Les données personnelles que vous fournissez lors de l'inscription (nom d'utilisateur et email) sont uniquement utilisées pour la gestion de votre compte. Aucune adresse IP n'est conservée par notre site. Vos données ne sont en aucun cas transmises à des tiers. Conformément à la loi "Informatique et Libertés" et au RGPD, vous disposez d'un droit d'accès, de rectification et d'opposition aux données vous concernant, que vous pouvez exercer en nous contactant à l'adresse indiquée ci-dessus.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>