// Créer une fonction pour appliquer notre animation à un lien , Pour navbar
function applyAnimation(link) {
    link.addEventListener('mouseover', function() {
        anime({
            targets: link,
            scale: 1.05, // plus subtil
            color: '#333333', // une couleur plus proche de la couleur originale
            duration: 200,
            easing: 'easeInOutQuad'
        });
    });

    link.addEventListener('mouseout', function() {
        anime({
            targets: link,
            scale: 1.0,
            color: '#000000',
            duration: 200,
            easing: 'easeInOutQuad'
        });
    });
}

// Créer un MutationObserver pour écouter les modifications du DOM
let observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        if (mutation.addedNodes) {
            mutation.addedNodes.forEach(function(node) {
                if (node.nodeType === 1 && node.matches('nav a')) {
                    applyAnimation(node);
                }
            });
        }
    });
});

// Commencer à observer le document avec la configuration appropriée
observer.observe(document, { childList: true, subtree: true });

// Appliquer l'animation à tous les liens existants au chargement initial de la page
document.querySelectorAll('nav a').forEach(applyAnimation);

