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
