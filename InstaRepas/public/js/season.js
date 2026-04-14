document.addEventListener('DOMContentLoaded', () => {
    const seasonGrid = document.querySelector('.season-grid');
    const seasonButtons = document.querySelectorAll('.season-button');
    const heroTitle = document.querySelector('#hero-title');
    const logo = document.querySelector('#logo');
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!seasonGrid || !seasonButtons.length) {
        return;
    }

    const foods = [
        { name: '🍏 Pomme', season: 'Automne', benefits: 'Riche en fibres et facile à intégrer dans un petit-déjeuner, une collation ou un dessert léger.' },
        { name: '🍄 Champignon', season: 'Automne', benefits: 'Pratique pour enrichir les plats chauds, varier les textures et soutenir une cuisine plus végétale.' },
        { name: '🌰 Châtaigne', season: 'Automne', benefits: 'Apporte une sensation de satiété agréable et une vraie touche saisonnière dans les repas.' },
        { name: '🍐 Poire', season: 'Automne', benefits: 'Un fruit simple et polyvalent, utile pour équilibrer facilement les pauses et les desserts.' },
        { name: '🍊 Orange', season: 'Hiver', benefits: 'Un repère classique pour ajouter fraîcheur et vitamine C pendant les périodes plus froides.' },
        { name: '🥕 Carotte', season: 'Hiver', benefits: 'Facile à cuisiner, elle fonctionne aussi bien en soupe, en poêlée qu’en crudités.' },
        { name: '🥦 Brocoli', season: 'Hiver', benefits: 'Aide à varier les légumes verts et s’intègre rapidement dans des repas simples et rassasiants.' },
        { name: '🍋 Citron', season: 'Hiver', benefits: 'Très utile pour relever les plats et donner un peu de tension aux préparations du quotidien.' },
        { name: '🍓 Fraise', season: 'Printemps', benefits: 'Apporte une touche plus vive et légère aux petits-déjeuners, collations et desserts.' },
        { name: '🥬 Laitue', season: 'Printemps', benefits: 'Une base fraîche et facile à mobiliser pour remettre de la légèreté dans les assiettes.' },
        { name: '🥒 Concombre', season: 'Printemps', benefits: 'Très simple à utiliser quand on veut des repas plus frais sans alourdir la préparation.' },
        { name: '🍍 Ananas', season: 'Printemps', benefits: 'Permet d’apporter une note fruitée plus tonique dans les assiettes et les encas.' },
        { name: '🍅 Tomate', season: 'Été', benefits: 'Un indispensable pour composer rapidement des repas frais, colorés et plus variés.' },
        { name: '🍉 Pastèque', season: 'Été', benefits: 'Aide à garder une sensation de fraîcheur pendant les périodes de chaleur.' },
        { name: '🍑 Pêche', season: 'Été', benefits: 'S’intègre facilement aux pauses sucrées ou aux desserts simples et plus saisonniers.' },
        { name: '🫐 Myrtille', season: 'Été', benefits: 'Pratique pour ajouter couleur, douceur et variété aux petits-déjeuners ou aux collations.' },
    ];

    const animateCards = (cards) => {
        if (reduceMotion || typeof window.anime !== 'function') {
            cards.forEach((card) => {
                card.style.opacity = '1';
                card.style.transform = 'none';
            });
            return;
        }

        window.anime({
            targets: cards,
            translateY: [18, 0],
            opacity: [0, 1],
            duration: 420,
            easing: 'easeOutQuad',
            delay: window.anime.stagger(80),
        });
    };

    const buildCards = (season) => {
        const seasonalFoods = foods.filter((food) => food.season === season);

        seasonGrid.innerHTML = '';

        seasonalFoods.forEach((food) => {
            const card = document.createElement('article');
            card.className = 'food-card';
            card.setAttribute('role', 'listitem');

            const title = document.createElement('h3');
            title.className = 'text-lg font-semibold text-slate-900';
            title.textContent = food.name;

            const seasonLabel = document.createElement('p');
            seasonLabel.className = 'mt-3 text-sm uppercase tracking-[0.18em] text-emerald-700';
            seasonLabel.textContent = `Saison: ${food.season}`;

            const benefits = document.createElement('p');
            benefits.className = 'mt-3 leading-7 text-slate-600';
            benefits.textContent = food.benefits;

            card.appendChild(title);
            card.appendChild(seasonLabel);
            card.appendChild(benefits);
            seasonGrid.appendChild(card);
        });

        animateCards(seasonGrid.querySelectorAll('.food-card'));
    };

    const setActiveSeason = (season) => {
        seasonButtons.forEach((button) => {
            button.classList.toggle('is-active', button.dataset.season === season);
        });
        buildCards(season);
    };

    const getSeasonFromMonth = (month) => {
        if (month < 2 || month === 11) {
            return 'Hiver';
        }
        if (month < 5) {
            return 'Printemps';
        }
        if (month < 8) {
            return 'Été';
        }
        return 'Automne';
    };

    seasonButtons.forEach((button) => {
        button.addEventListener('click', () => {
            setActiveSeason(button.dataset.season);
        });
    });

    if (heroTitle && !reduceMotion && typeof window.anime === 'function') {
        const text = heroTitle.textContent || '';
        heroTitle.innerHTML = text
            .split('')
            .map((character) => `<span class="hero-letter">${character === ' ' ? '&nbsp;' : character}</span>`)
            .join('');

        window.anime({
            targets: '.hero-letter',
            opacity: [0, 1],
            translateY: [18, 0],
            easing: 'easeOutQuad',
            duration: 760,
            delay: window.anime.stagger(18),
        });
    }

    if (logo && !reduceMotion && typeof window.anime === 'function') {
        window.anime({
            targets: logo,
            rotate: [0, 6, 0],
            duration: 3400,
            easing: 'easeInOutSine',
            loop: true,
        });
    }

    setActiveSeason(getSeasonFromMonth(new Date().getMonth()));
});
