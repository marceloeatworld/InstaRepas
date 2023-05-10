<x-app-layout>
    @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
<div class="bg-cover bg-center h-screen flex flex-col justify-center items-center bg-cover-meal">
        <h1 class="text-white font-bold text-5xl mb-8">Créer vos repas</h1>
        <a href="/generate" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">Démarrer</a>
      </div>
      

    
    <!-- 2ème partie : -->
    

    <div class="flex flex-col md:flex-row items-center justify-center py-16 bg-gray-100 mx-auto">
        <div class="md:w-1/2 p-4">
          <img src="/imgs/CubeLegume.png" alt="Image de présentation" class="max-w-xs mx-auto">
        </div>
        
        <div class="md:w-1/2 p-4">
          <h2 class="text-5xl font-bold mb-8">InstaRepas</h2>
          <h3 class="text-3xl font-bold mb-4">Meilleur repas</h3>
      
          <p class="text-gray-700 leading-relaxed mb-4">
            Cette outil vous permet de créer des repas personnalisés en fonction de vos préférences alimentaires. Créez des repas équilibrés et savoureux pour chaque jour de la semaine en quelques clics
          </p>
      
          <div class="flex justify-center md:justify-start">
            <a href="#" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
              Créer
            </a>
          </div>
        </div>
      </div>
    
    <!-- 3ème partie : -->
    

    <div class="bg-cover bg-center h-screen flex flex-col justify-center items-center bg-cover-season">
        <h2 class="text-5xl font-bold mb-8">Aliments de saison</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="bg-white rounded-lg shadow-md p-4">
            <img src="/imgs/[removal.ai]_13fd2d59-9c5b-413a-9322-ccb16d0774d1.png" alt="Image 1" class="w-full rounded-lg mb-4">
            <h3 class="text-lg font-bold mb-2">Card 1</h3>
            <p class="text-gray-700 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum mattis nibh, id sagittis quam elementum nec.</p>
          </div>
          <div class="bg-white rounded-lg shadow-md p-4">
            <img src="/imgs/[removal.ai]_b4e187cd-b953-432b-8cc6-fea863bcae20.png" alt="Image 2" class="w-full rounded-lg mb-4">
            <h3 class="text-lg font-bold mb-2">Card 2</h3>
            <p class="text-gray-700 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum mattis nibh, id sagittis quam elementum nec.</p>
          </div>
          <div class="bg-white rounded-lg shadow-md p-4">
            <img src="/imgs/[removal.ai]_bf62061e-ab42-4108-b6c4-92df8e575815.png" alt="Image 3" class="w-full rounded-lg mb-4">
            <h3 class="text-lg font-bold mb-2">Card 3</h3>
            <p class="text-gray-700 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum mattis nibh, id sagittis quam elementum nec.</p>
          </div>
          <div class="bg-white rounded-lg shadow-md p-4">
            <img src="/imgs/[removal.ai]_e1b60685-0f61-4743-ac59-6e0e72e0cbdf.png" alt="Image 4" class="w-full rounded-lg mb-4">
            <h3 class="text-lg font-bold mb-2">Card 4</h3>
            <p class="text-gray-700 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum mattis nibh, id sagittis quam elementum nec.</p>
          </div>
        </div>
      </div>
      
    <!-- 4ème partie : -->
    

    <div class="h-screen flex flex-col justify-center items-center">
      <h2 class="text-5xl font-bold mb-8">Un choix de préférence</h2>
    </div>
   
    
    <!-- 5ème partie : -->
    

    <div class="bg-gray-100 py-16">
      <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-8">Avis clients</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white rounded-lg shadow-md p-4">
            <p class="text-gray-700 leading-relaxed mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum mattis nibh, id sagittis quam elementum nec."</p>
            <p class="text-gray-600 font-bold">Tony Tolga</p>
          </div>
          <div class="bg-white rounded-lg shadow-md p-4">
            <p class="text-gray-700 leading-relaxed mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum mattis nibh, id sagittis quam elementum nec."</p>
            <p class="text-gray-600 font-bold">Tony Tolga</p>
          </div>
          <div class="bg-white rounded-lg shadow-md p-4">
            <p class="text-gray-700 leading-relaxed mb-4">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras bibendum mattis nibh, id sagittis quam elementum nec."</p>
            <p class="text-gray-600 font-bold">Tony Tolga</p>
          </div>
        </div>
      </div>
    </div>

                  
</x-app-layout>