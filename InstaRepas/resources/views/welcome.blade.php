<x-app-layout>
<div class='bg-cover bg-center h-screen flex flex-col justify-center items-center bg-cover-meal'>
    <h1 class='text-white font-bold text-5xl mb-8 shadow-text'>Créez vos repas personnalisés pour la semaine</h1>
    <div class='flex flex-col items-center justify-center mb-4'>
    <p class='text-white text-xl mb-2 shadow-text text-center'>Planifiez à l'avance et simplifiez votre routine de préparation de repas.</p>
    <p class='text-white text-xl mb-4 shadow-text text-center'>Commencez votre voyage vers une alimentation plus saine et équilibrée aujourd'hui.</p>
</div>

    <a href='/generate' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full'>Explorez maintenant</a>

</div>


</div>

<!-- 2ème partie : -->
<div class='flex flex-col md:flex-row items-center justify-center py-12 bg-gray-100 mx-auto px-4 sm:px-0'>
  <div class='md:w-1/2 p-4'>
    <img id='logo' src='/imgs/logo_for_foodequlibre.png' alt='Logo Food Équilibre' class='max-w-xs md:max-w-sm mx-auto'>
  </div>
  <div class='md:w-1/2 p-4 text-center md:text-left'>
    <h2 class='text-4xl md:text-5xl font-bold mb-2 md:mb-4'>Food Équilibre</h2>
    <h3 class='text-2xl md:text-3xl font-bold mb-2 md:mb-4'>Réinventez votre alimentation</h3>
    <p class='text-gray-700 leading-relaxed mb-6 text-md md:text-lg font-medium max-w-lg mx-auto md:mx-0'>
      Avec <strong>Food Équilibre</strong>, la nutrition n'a jamais été aussi simple et délicieuse. Notre plateforme innovante vous offre la possibilité de créer des <strong>repas personnalisés</strong> adaptés à vos besoins et préférences. Enrichissez votre menu avec de nouveaux aliments saisonniers, et profitez d'une <strong>alimentation variée et riche en nutriments</strong> tout au long de l'année.
    </p>
    <div class='flex justify-center md:justify-start'>
      <a href='/generate' class='bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full'>
        Commencez l'aventure
      </a>
    </div>
  </div>
</div>



<!-- 3ème partie : -->
<div class='bg-cover bg-center h-screen flex flex-col justify-center items-center bg-cover-season' role='contentinfo' aria-label='Seasonal Foods'>
<h2 class='text-white font-bold text-5xl mb-8 shadow-text' tabindex="0">Aliments de saison : le choix santé</h2>
  <div class='grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-5 md:px-0' role='list'>
        <div class='food-card bg-white rounded-lg shadow-md p-4 transition-all ease-in-out duration-500 transform translate-x-0 sm:translate-x-32 delay-75' role='listitem'>
            <h3 class='text-lg font-bold mb-2 text-gray-800' tabindex="0">Automne</h3>
            <p class='text-gray-700 leading-relaxed' tabindex="0">Les pommes croquantes, les courges douces et les noix savoureuses abondent. La nature est généreuse, alors profitons de cette saison de récolte!</p>
        </div>
        <div class='food-card bg-white rounded-lg shadow-md p-4 transition-all ease-in-out duration-500 transform translate-x-0 sm:translate-x-32 delay-150' role='listitem'>
            <h3 class='text-lg font-bold mb-2 text-gray-800' tabindex="0">Hiver</h3>
            <p class='text-gray-700 leading-relaxed' tabindex="0">Les oranges juteuses et les légumes-racines robustes sont les stars. Il fait froid dehors, mais ces aliments nous réchauffent de l'intérieur.</p>
        </div>
        <div class='food-card bg-white rounded-lg shadow-md p-4 transition-all ease-in-out duration-500 transform translate-x-0 sm:translate-x-32 delay-225' role='listitem'>
            <h3 class='text-lg font-bold mb-2 text-gray-800' tabindex="0">Printemps</h3>
            <p class='text-gray-700 leading-relaxed' tabindex="0">Les premières pousses vertes émergent de la terre. Les légumes printaniers frais et croquants nous réveillent après l'hiver.</p>
        </div>
        <div class='food-card bg-white rounded-lg shadow-md p-4 transition-all ease-in-out duration-500 transform translate-x-0 sm:translate-x-32 delay-300' role='listitem'>
            <h3 class='text-lg font-bold mb-2 text-gray-800' tabindex="0">Été</h3>
            <p class='text-gray-700 leading-relaxed' tabindex="0">C'est le moment des tomates juteuses, des baies sucrées et des herbes fraîches. La chaleur du soleil se retrouve dans chaque bouchée.</p>
        </div>
    </div>

    <div class="seasons-switch flex justify-center mt-6">
  <button id="Automne" class="season-button bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-l mr-2">Automne</button>
  <button id="Hiver" class="season-button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2">Hiver</button>
  <button id="Printemps" class="season-button bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 mr-2">Printemps</button>
  <button id="Été" class="season-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-r">Été</button>
</div>


</div>



<div class='h-auto flex flex-col justify-center items-center py-12 text-center px-4 sm:px-0'>
  <h2 class='text-4xl sm:text-5xl font-bold mb-4 sm:mb-8  max-w-2xl mx-auto leading-snug'>Food Équilibre : Un choix adapté à vos préférences</h2>
  <p class='text-gray-700 text-lg sm:text-xl mb-4 max-w-xl mx-auto leading-relaxed'>
    Que vous soyez végétalien, sans gluten, ou que vous aimiez tout simplement la viande, Food Équilibre crée des repas parfaitement adaptés à votre style de vie. <br>En vous inscrivant, vous pouvez sauvegarder vos préférences et les retrouver à chaque connexion. <br>Fini le temps perdu à refaire constamment vos choix, avec Food Équilibre, votre sélection reste à portée de main.<br> Découvrez l'expérience de la personnalisation alimentaire poussée à son paroxysme. Allez-y, inscrivez-vous et commencez à découvrir votre nouvel allié nutritionnel.
  </p>
  <a href='/register' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full'>Inscrivez-vous maintenant</a>
</div>



<!-- 5ème partie : -->
<div class='bg-gray-100 py-16'>
    <div class='container mx-auto px-4 sm:px-6 lg:px-8'>
        <h2 class='text-3xl font-bold mb-8 text-center'>Notre Histoire</h2>
        <div class='flex justify-center'>
            <div class='bg-white rounded-lg shadow-md p-8 md:p-16 max-w-4xl' style="font-family: 'Roboto', sans-serif;">
                <p class='text-gray-700 leading-relaxed mb-6'>
                    Trois étudiants passionnés par la technologie et l'innovation ont décidé d'apporter une solution à une problématique sociale : améliorer l'alimentation quotidienne. S'associant avec une organisation caritative, ils ont utilisé leurs compétences en programmation pour concevoir Food Équilibre, une plateforme facilitant la création de repas équilibrés et personnalisés.
                </p>
                <p class='text-gray-700 leading-relaxed mb-6'>
                    Ce projet est un exemple vibrant de "social coding", où la technologie est utilisée pour résoudre des problèmes concrets et apporter des bénéfices tangibles à la société. Nous sommes ravis de partager cette solution avec vous et nous sommes impatients de recevoir vos commentaires.
                </p>
                <div class='text-center'>
                    <a href='/contact' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full'>Contactez-nous</a>
                </div>
            </div>
        </div>
    </div>
</div>





<script>


let originalFoodsArray = [
    { name: '🍏 Pomme', season: 'Automne', benefits: 'Riches en fibres et vitamine C, les pommes peuvent améliorer la santé cardiaque.' },
    { name: '🍄 Champignon', season: 'Automne', benefits: 'Les champignons sont une excellente source de vitamines B et de sélénium, qui soutiennent le système immunitaire.' },
    { name: '🌰 Châtaigne', season: 'Automne', benefits: 'Les châtaignes sont une bonne source de vitamines B, de minéraux et de fibres.' },
    { name: '🍇 Raisin', season: 'Automne', benefits: 'Les raisins sont riches en antioxydants, qui peuvent réduire l\'inflammation et protéger contre le cancer et les maladies cardiaques.' },
    { name: '🎃 Citrouille', season: 'Automne', benefits: 'La citrouille est pleine de vitamines et de minéraux, tout en étant faible en calories. Elle est également riche en bêta-carotène.' },
    { name: '🍐 Poire', season: 'Automne', benefits: 'Les poires sont une excellente source de fibres et de vitamine C.' },
    { name: '🥦 Chou de Bruxelles', season: 'Automne', benefits: 'Les choux de Bruxelles sont riches en fibres, vitamines C et K, et contiennent de nombreux antioxydants.' },
    { name: '🍠 Patate douce', season: 'Automne', benefits: 'Les patates douces sont une excellente source de vitamines A et C, et sont également riches en fibres.' },
    { name: '🍊 Orange', season: 'Hiver', benefits: 'Les oranges sont connues pour leur teneur élevée en vitamine C, qui peut stimuler l\'immunité.' },
    { name: '🥕 Carotte', season: 'Hiver', benefits: 'Les carottes sont une excellente source de vitamine A et de fibres.' },
    { name: '🥔 Pomme de terre', season: 'Hiver', benefits: 'Les pommes de terre sont une bonne source de vitamines C et B6, de potassium et de fibres.' },
    { name: '🥦 Brocoli', season: 'Hiver', benefits: 'Le brocoli est riche en fibres, vitamine C et K, et il est une bonne source de folate.' },
    { name: '🍋 Citron', season: 'Hiver', benefits: 'Les citrons sont très riches en vitamine C et peuvent aider à améliorer la santé cardiaque.' },
    { name: '🥬 Chou frisé', season: 'Hiver', benefits: 'Le chou frisé est l\'un des légumes les plus nutritifs, riche en vitamines A, K et C.' },
    { name: '🍌 Banane', season: 'Hiver', benefits: 'Les bananes sont une excellente source de vitamine B6 et de fibres.' },
    { name: '🥑 Avocat', season: 'Hiver', benefits: 'Les avocats sont riches en graisses saines, en fibres et en vitamines E et K.' },
    { name: '🍓 Fraise', season: 'Printemps', benefits: 'Les fraises sont riches en vitamines, fibres et antioxydants.' },
    { name: '🍒 Cerise', season: 'Printemps', benefits: 'Les cerises sont pleines d\'antioxydants et d\'anti-inflammatoires.' },
    { name: '🥬 Laitue', season: 'Printemps', benefits: 'La laitue est faible en calories et riche en fibres, vitamines A et C.' },
    { name: '🌽 Maïs', season: 'Printemps', benefits: 'Le maïs est riche en fibres et contient de bons niveaux de plusieurs vitamines B.' },
    { name: '🥦 Brocoli', season: 'Printemps', benefits: 'Le brocoli est riche en fibres, vitamine C et K, et il est une bonne source de folate.' },
    { name: '🍍 Ananas', season: 'Printemps', benefits: 'L\'ananas est riche en vitamine C et contient une enzyme appelée bromélaïne, qui peut combattre l\'inflammation et aider à la digestion.' },
    { name: '🍠 Asperges', season: 'Printemps', benefits: 'Les asperges sont une excellente source de fibres, de folate, de vitamines A, C, E et K.' },
    { name: '🥒 Concombre', season: 'Printemps', benefits: 'Les concombres sont hydratants et faibles en calories. Ils contiennent des antioxydants importants et peuvent aider à la digestion.' },
    { name: '🍅 Tomate', season: 'Été', benefits: 'Les tomates sont une excellente source de vitamine C, de potassium, de folate et de vitamine K.' },
    { name: '🍉 Pastèque', season: 'Été', benefits: 'La pastèque est hydratante et riche en vitamines A et C.' },
    { name: '🍑 Pêche', season: 'Été', benefits: 'Les pêches sont riches en fibres, vitamines A, C, E et K et contiennent de nombreux minéraux essentiels.' },
    { name: '🌶️ Poivron', season: 'Été', benefits: 'Les poivrons sont très riches en antioxydants et en vitamine C.' },
    { name: '🍒 Cerise', season: 'Été', benefits: 'Les cerises sont pleines d\'antioxydants et d\'anti-inflammatoires.' },
    { name: '🍈 Melon', season: 'Été', benefits: 'Le melon est riche en vitamines A et C et est également une bonne source d\'hydratation.' },
    { name: '🫐 Myrtilles', season: 'Été', benefits: 'Les myrtilles sont l\'un des aliments les plus riches en antioxydants. Elles sont également riches en vitamines C et K.' },
    { name: '🍇 Raisins', season: 'Été', benefits: 'Les raisins sont une excellente source de vitamines C et K, et contiennent également de nombreux antioxydants bénéfiques.' }

];

// On fait une copie de originalFoodsArray pour garder l'original intact
//Cette ligne de code crée une copie du tableau originalFoodsArray, 
//permettant des opérations de filtrage et de manipulation sur la copie, sans modifier le tableau original, assurant ainsi la conservation des données initiales.
let seasonalFoods = [...originalFoodsArray];

// Cette fonction détermine la saison en fonction du mois donné
function getSeasonFromMonth(month) {
    // Le mois est basé sur un index de 0 (Janvier = 0, Février = 1, etc.)
    if (month < 2 || month === 11) {
        return 'Hiver';
    } else if (month < 5) {
        return 'Printemps';
    } else if (month < 8) {
        return 'Été';
    } else {
        return 'Automne';
    }
}


// Cette fonction met à jour les cartes d'aliments en fonction de la saison
function updateFoodCards(season) {
    // Filtrer les aliments en fonction de la saison
    seasonalFoods = originalFoodsArray.filter(food => food.season === season);
    // Recréer les cartes d'aliments
    createFoodCards(season);
}

// Cette fonction crée les cartes d'aliments
function createFoodCards(season) {
    // Obtenir le conteneur de nourriture
    const foodContainer = document.querySelector('.grid');

    // Supprimer toutes les cartes d'aliments existantes
    while (foodContainer.firstChild) {
        foodContainer.firstChild.remove();
    }

    // Créer une nouvelle carte pour chaque aliment
    for (const food of seasonalFoods) {
        const foodCard = document.createElement('div');
        foodCard.className = 'food-card bg-white rounded-lg shadow-md p-4 transition-all ease-in-out duration-500 transform translate-x-32';


        const foodName = document.createElement('h3');
        foodName.className = 'text-lg font-bold mb-2';
        const [emoji, text] = food.name.split(' ');
        foodName.innerHTML = `<span class="big-emoji">${emoji}</span> ${text}`;

        const foodSeason = document.createElement('p');
        foodSeason.className = 'text-gray-700 leading-relaxed';
        foodSeason.textContent = `Saison: ${food.season}`;

        const foodBenefits = document.createElement('p');
        foodBenefits.className = 'text-gray-900 font-medium mb-6';
        foodBenefits.textContent = `Bienfaits: ${food.benefits}`;

        foodCard.appendChild(foodName);
        foodCard.appendChild(foodSeason);
        foodCard.appendChild(foodBenefits);
        // Ajouter la carte à la grille
        foodContainer.appendChild(foodCard);
    }

    // Animer les cartes
    animateCards(season);
}

// Fonction pour animer les cartes en fonction de la saison
function animateCards(season) {
    const cards = document.querySelectorAll('.food-card');
    let animation;
    switch (season) {
        case 'Hiver':
            animation = { translateX: [-100, 0], opacity: [0, 1] };
            break;
        case 'Printemps':
            animation = { translateY: [-100, 0], opacity: [0, 1] };
            break;
        case 'Été':
            animation = { scale: [0.5, 1], opacity: [0, 1] };
            break;
        case 'Automne':
            animation = { rotate: ['90deg', '0deg'], opacity: [0, 1] };
            break;
    }
    anime({
        targets: cards,
        ...animation,
        duration: 500,
        easing: 'easeInOutQuad',
        delay: anime.stagger(100),
    });
}

// Obtenir le mois actuel
const currentMonth = new Date().getMonth();
// Obtenir la saison actuelle à partir du mois
const currentSeason = getSeasonFromMonth(currentMonth);
// Mettre à jour les cartes d'aliments pour la saison actuelle
updateFoodCards(currentSeason);

// Ajouter un écouteur d'événements à chaque bouton de saison
document.querySelectorAll('.season-button').forEach(button => {
    button.addEventListener('click', function(event) {
        // Mettre à jour les cartes d'aliments lorsque le bouton est cliqué
        updateFoodCards(event.target.id);
    });
});

// Quand la page est complètement chargée
window.onload = function() {
    const navLinks = document.querySelectorAll('.navbar a');
    navLinks.forEach(link => {
        link.addEventListener('mouseover', function() {
            anime({
                targets: link,
                scale: 1.2,
                duration: 200,
                easing: 'easeInOutQuad'
            });
        });
        link.addEventListener('mouseout', function() {
            anime({
                targets: link,
                scale: 1.0,
                duration: 200,
                easing: 'easeInOutQuad'
            });
        });
    });

    let observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCard(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -200px 0px' });

    const cards = document.querySelectorAll('.food-card');
    cards.forEach(card => {
        observer.observe(card);
    });

    function animateCard(card) {
        anime({
            targets: card,
            scale: [0.1, 1],
            opacity: [0, 1],
            duration: 500,
            easing: 'easeInOutQuad'
        });
        card.addEventListener('mouseover', function() {
            anime({
                targets: card,
                scale: 1.05,
                duration: 200,
                easing: 'easeInOutQuad'
            });
        });
        card.addEventListener('mouseout', function() {
            anime({
                targets: card,
                scale: 1.0,
                duration: 200,
                easing: 'easeInOutQuad'
            });
        });
    }
};


//animer le logo
var animation = anime.timeline({
    loop: true,
    endDelay: 3000 // pause de 3 secondes à la fin de chaque rotation
  });

  animation
    .add({
      targets: '#logo',
      rotateY:  {value: 360, duration: 2000},
      easing: 'easeInOutSine'
    });


  //titre page 
  function wrapEveryLetter(element) {
  let text = element.innerHTML;
  let newText = "";
  for(let i = 0; i < text.length; i++) {
    newText += `<span class="letter">${text[i]}</span>`;
  }
  element.innerHTML = newText;
}
let element = document.querySelector('.text-white');
wrapEveryLetter(element);
anime.timeline({loop: false})
  .add({
    targets: '.text-white .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 1250,
    delay: (el, i) => 50 * (i+1)
  });


</script>
</x-app-layout>