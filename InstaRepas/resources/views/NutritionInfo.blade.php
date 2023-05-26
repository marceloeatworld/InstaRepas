<x-app-layout>

    <!-- Section : Conseils de Nutrition -->
    <section class="container mx-auto my-8 px-4 md:px-0">
      <h2 class="text-3xl font-bold mb-6 text-center">Conseils de Nutrition</h2>
      
      <ul class="list-disc pl-8 text-lg leading-relaxed">
        <li>Essayez de manger à des heures régulières, de préférence dans le calme et avec plaisir.</li>
        <li>Limitez votre consommation de sel en salant modérément vos aliments. Préférez l'utilisation d'aromates, d'épices ou de condiments pour rehausser la saveur de vos plats.</li>
        <li>Privilégiez les modes de cuisson doux comme la vapeur, en papillote, à l'eau, au four, au gril, à la broche ou dans une poêle anti-adhésive.</li>
        <li>Pensez à utiliser des légumes surgelés au naturel (sans ajout de matières grasses ou de sel) qui sont aussi intéressants que les produits frais et plus rapides à préparer.</li>
        <li>L'eau, qu'elle soit du robinet ou minérale, est essentielle à l'organisme. Buvez régulièrement tout au long de la journée, en privilégiant l'eau, les tisanes ou le thé.</li>
        <li>En cas de repas copieux (fête, invitation...), évitez de cumuler les excès (boissons alcoolisées, biscuits apéritifs, plats en sauce...). Limitez les quantités et l'alcool. Le repas suivant devra être plus léger pour compenser.</li>
        <li>Il est préférable de faire vos courses après avoir mangé, afin d'éviter les achats impulsifs liés à la faim.</li>
        <li>Ne négligez pas l'importance de l'activité physique. Intégrez du mouvement à votre quotidien ou pratiquez une activité physique régulièrement.</li>
      </ul>
    </section>

    <!-- Section : Familles d'Aliments -->
    <section class="mt-16 container mx-auto my-8 px-4 md:px-0">
      <h2 class="text-3xl font-bold mb-6 text-center">Familles d'Aliments</h2>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Div : Produits laitiers -->
        <div class="bg-white rounded-lg p-6 shadow-md">
          <h3 class="text-xl font-bold mb-4">
            <span class="text-4xl mr-2">🥛</span>
            Produits laitiers
          </h3>
          <p class="text-lg leading-relaxed">Lait, fromages, yaourts... Ils sont une source importante de protéines, de calcium et de certaines vitamines du groupe B. Consommez 2 à 3 portions par jour pour un apport optimal en calcium.</p>
        </div>
        <!-- Div : Viande - Poisson - Œufs -->
        <div class="bg-white rounded-lg p-6 shadow-md">
          <h3 class="text-xl font-bold mb-4">
            <span class="text-4xl mr-2">🍖</span>
            Viande - Poisson - Œufs
          </h3>
          <p class="text-lg leading-relaxed">Ces aliments sont principalement riches en protéines et en fer. Ils devraient être consommés 1 à 2 fois par jour. Toutefois, limitez votre consommation de charcuteries car elles contiennent beaucoup de matières grasses.</p>
        </div>
        <!-- Div : Fruits et Légumes -->
        <div class="bg-white rounded-lg p-6 shadow-md">
          <h3 class="text-xl font-bold mb-4">
            <span class="text-4xl mr-2">🥦</span>
            Fruits et Légumes
          </h3>
          <p class="text-lg leading-relaxed">Les fruits et légumes sont riches en vitamines, en antioxydants et en fibres. Il est recommandé d'en consommer 2 à 3 portions de chaque par jour, en variant entre les aliments crus et cuits.</p>
        </div>
        <!-- Div : Féculents -->
        <div class="bg-white rounded-lg p-6 shadow-md">
          <h3 class="text-xl font-bold mb-4">
            <span class="text-4xl mr-2">🍞</span>
            Féculents
          </h3>
          <p class="text-lg leading-relaxed">Pain, pâtes, riz, pommes de terre, légumes secs... Ils fournissent des glucides, des protéines, des vitamines du groupe B, des minéraux et des fibres. Il est recommandé de les inclure à chaque repas.</p>
        </div>
        <!-- Div : Matières Grasses -->
        <div class="bg-white rounded-lg p-6 shadow-md">
          <h3 class="text-xl font-bold mb-4">
            <span class="text-4xl mr-2">🧈</span>
            Matières Grasses
          </h3>
          <p class="text-lg leading-relaxed">Ces aliments sont une source de lipides et de vitamines A, D (beurre et crème) et E (huile de colza ou de noix). Variez les sources de matières grasses pour bénéficier de leurs différents apports nutritionnels.</p>
        </div>
        <!-- Div : Sucres et Produits Sucrés -->
        <div class="bg-white rounded-lg p-6 shadow-md">
          <h3 class="text-xl font-bold mb-4">
            <span class="text-4xl mr-2">🍬</span>
            Sucres et Produits Sucrés
          </h3>
          <p class="text-lg leading-relaxed">Sucre, pâtisseries, biscuits, confitures... Ils ne sont pas essentiels à notre équilibre alimentaire, mais ils peuvent apporter du plaisir. Consommez-les avec modération.</p>
        </div>
        <!-- Div : Boissons -->
        <div class="bg-white rounded-lg p-6 shadow-md">
          <h3 class="text-xl font-bold mb-4">
            <span class="text-4xl mr-2">🥤</span>
            Boissons
          </h3>
          <p class="text-lg leading-relaxed">L'eau est la seule boisson indispensable à notre organisme. Les autres boissons peuvent être consommées pour le plaisir, toujours avec modération. Veillez à boire au moins un litre d'eau par jour.</p>
        </div>
      </div>
    </section>

</x-app-layout>
