<x-app-layout>
  <!-- Première partie : -->
  <div class='bg-cover bg-center h-screen flex flex-col justify-center items-center bg-cover-meal'>
    <h1 class='text-white font-bold text-3xl sm:text-4xl md:text-5xl mb-8 shadow-text'>Créez vos repas personnalisés pour la semaine</h1>
    <div class='flex flex-col items-center justify-center mb-4'>
      <p class='text-white text-base sm:text-lg md:text-xl mb-2 shadow-text text-center'>Planifiez à l'avance vos menus pour votre quotidien, et simplifiez votre routine de préparation de repas.</p>
      <p class='text-white text-base sm:text-lg md:text-xl mb-4 shadow-text text-center'>Commencez votre voyage vers une alimentation plus saine et équilibrée aujourd'hui.</p>
    </div>
    <a id="buttonF" href='/generate' class=''>Génerer vos repas maintenant</a>

  </div>


</div>

  <!-- 2ème partie : -->
  <div class='flex flex-col md:flex-row items-center justify-center py-12 bg-gray-100 mx-auto px-4 sm:px-0'>
    <div class='md:w-1/2 p-4'>
      <img id='logo' src='/imgs/logo_for_foodequlibre.webp' alt='Logo InstaRepas' class='max-w-xs md:max-w-sm mx-auto'>
    </div>
    <div class='md:w-1/2 p-4 text-center md:text-left'>

    <h2 class='text-4xl md:text-5xl font-bold mb-2 md:mb-4'>InstaRepas</h2>
    <h3 class='text-2xl md:text-3xl font-bold mb-2 md:mb-4'>Des idées de menus du quotidien</h3>
    <p class='text-gray-700 leading-relaxed mb-6 text-md md:text-lg font-medium max-w-lg mx-auto md:mx-0'>
    Avec <strong>InstaRepas</strong>, la nutrition n'a jamais été aussi simple et délicieuse. Cette plateforme innovante vous offre la possibilité de créer des <strong>repas personnalisés</strong> adaptés à vos besoins et préférences. Profitez d'une <strong>alimentation variée et riche en nutriments</strong> tout au long de l'année.

    </p>
    <div class='flex justify-center md:justify-start'>

      <x-yellow-button href="/generate" class="">Commencez l'aventure</x-yellow-button>

    </div>
  </div>
</div>



<!-- 3ème partie : -->
<div class='bg-cover bg-center flex flex-col justify-center items-center bg-cover-season' role='contentinfo' aria-label='Seasonal Foods'>
<h2 class='text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-8 shadow-sm' tabindex="0">Aliments de saison : le choix santé</h2>

  <div class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-5 md:px-0' role='list'>
    <div class='food-card bg-white rounded-lg shadow-md p-4 transition-all ease-in-out duration-500 transform translate-x-0 delay-75' role='listitem'>
       <h3 class='text-lg font-bold mb-2 text-gray-800' tabindex="0">Automne</h3>
            <p class='text-gray-700 leading-relaxed' tabindex="0">Les pommes croquantes, les courges douces et les noix savoureuses abondent. La nature est généreuse, alors profitons de cette saison de récolte!</p>
        </div>
        <div class='food-card bg-white rounded-lg shadow-md p-4 transition-all ease-in-out duration-500 transform translate-x-0 delay-150' role='listitem'>
            <h3 class='text-lg font-bold mb-2 text-gray-800' tabindex="0">Hiver</h3>
            <p class='text-gray-700 leading-relaxed' tabindex="0">Les oranges juteuses et les légumes-racines robustes sont les stars. Il fait froid dehors, mais ces aliments nous réchauffent de l'intérieur.</p>
        </div>
        <div class='food-card bg-white rounded-lg shadow-md p-4 transition-all ease-in-out duration-500 transform translate-x-0 delay-225' role='listitem'>
            <h3 class='text-lg font-bold mb-2 text-gray-800' tabindex="0">Printemps</h3>
            <p class='text-gray-700 leading-relaxed' tabindex="0">Les premières pousses vertes émergent de la terre. Les légumes printaniers frais et croquants nous réveillent après l'hiver.</p>
        </div>
        <div class='food-card bg-white rounded-lg shadow-md p-4 transition-all ease-in-out duration-500 transform translate-x-0 delay-300' role='listitem'>
            <h3 class='text-lg font-bold mb-2 text-gray-800' tabindex="0">Été</h3>
            <p class='text-gray-700 leading-relaxed' tabindex="0">C'est le moment des tomates juteuses, des baies sucrées et des herbes fraîches. La chaleur du soleil se retrouve dans chaque bouchée.</p>
        </div>
    </div>

    <div class="seasons-switch hidden md:flex flex-wrap justify-center mt-6">
    <button id="Automne" class="season-button bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-l mr-2 hover:shadow-lg">Automne</button>
    <button id="Hiver" class="season-button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 hover:shadow-lg">Hiver</button>
    <button id="Printemps" class="season-button bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 mr-2 hover:shadow-lg">Printemps</button>
    <button id="Été" class="season-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-r hover:shadow-lg">Été</button>
</div>

</div>



</div>


<!-- 4ème partie : -->
<div class='py-12 px-4 sm:px-0'>
  <div class='text-center max-w-2xl mx-auto'>
    <h2 class='text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 sm:mb-8 leading-snug'>InstaRepas : Un choix adapté à vos préférences</h2>

    <p class='text-gray-700 text-sm sm:text-base md:text-lg sm:text-xl mb-4 leading-relaxed'>

    Que vous soyez végétalien, sans gluten, ou que vous aimiez tout simplement la viande, InstaRepas crée des repas parfaitement adaptés à votre style de vie. <br>En vous inscrivant, vous pouvez sauvegarder vos préférences et les retrouver à chaque connexion. <br>Fini le temps perdu à refaire constamment vos choix, avec InstaRepas, votre sélection reste à portée de main.<br> Découvrez l'expérience de la personnalisation alimentaire poussée à son paroxysme. Allez-y, inscrivez-vous et commencez à découvrir votre nouvel allié nutritionnel.
    </p>
    <x-yellow-button href="{{ route('register') }}" class="">Inscrivez-vous maintenant</x-yellow-button>
  </div>
</div>



  <!-- 5ème partie : -->
  <div class='bg-gray-100 py-16'>
    <div class='container mx-auto px-4 sm:px-6 lg:px-8'>
        <h2 class='text-3xl font-bold mb-8 text-center'>Notre Histoire</h2>
        <div class='flex justify-center'>
            <div class='bg-white rounded-lg shadow-md p-8 md:p-16 max-w-4xl'>
                <p class='text-gray-700 leading-relaxed mb-6'>
                Insta Repas est l'innovation de 3 étudiants en informatique et de la diététicienne Aurélie Marino. Nous avons constaté que le problème majeur de nos patients était le manque d'idées pour leurs repas quotidiens. De là, l'idée d'Insta Repas était née, avec l'objectif de proposer des menus pour le quotidien, grâce à la technologie moderne.
                </p>
                <p class='text-gray-700 leading-relaxed mb-6'>
                Insta Repas offre une nouvelle approche pour diversifier vos habitudes alimentaires et alléger votre charge mentale au quotidien. Nous combinons notre expertise en diététique avec des outils technologiques de pointe pour vous fournir des solutions alimentaires personnalisées qui correspondent à vos besoins spécifiques.
                </p>
                <div class='flex justify-start'>
                    <x-yellow-button href="{{ route('contact') }}" class="">Contactez-nous</x-yellow-button>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="js/season.js"></script>

</x-app-layout>
