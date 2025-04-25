<footer class="bg-[#FFDB58] text-black-300 py-2 md:py-6" itemscope itemtype="https://schema.org/WPFooter">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-4">
      <div class="mb-4 md:mb-0 px-2">
        <h4 class="text-base md:text-lg font-bold mb-2">Liens rapides</h4>
        <nav aria-label="Liens de pied de page" role="navigation">
          <ul class="list-reset leading-tight text-black-600">
            <li class="mb-1"><a href="/" class="hover:text-gray-500" title="Page d'accueil InstaRepas" aria-label="Accueil du site InstaRepas">Accueil</a></li>
            <li class="mb-1"><a href="/contact" class="hover:text-gray-500" title="Contactez l'équipe InstaRepas" aria-label="Formulaire de contact InstaRepas">Nous-contacter</a></li>
            <li class="mb-1"><a href="/a-propos" class="hover:text-gray-500" title="En savoir plus sur InstaRepas" aria-label="À propos d'InstaRepas">À propos</a></li>
            <li class="mb-1"><a href="{{ route('legal') }}" class="hover:text-gray-500" title="Mentions légales et conditions d'utilisation" aria-label="Mentions légales d'InstaRepas">Mentions légales</a></li>
          </ul>
        </nav>
      </div>
      <div class="mb-4 md:mb-0 px-2">
        <h4 class="text-base md:text-lg font-bold mb-2">Suivez-nous</h4>
        <ul class="list-reset leading-tight text-black-600" itemscope itemtype="https://schema.org/Organization">
          <link itemprop="url" href="{{ url('/') }}">
          <li class="mb-1">
            <a href="https://www.instagram.com/foodequilibre/" class="flex items-center hover:text-gray-500" target="_blank" rel="noopener" itemprop="sameAs" title="Suivez InstaRepas sur Instagram" aria-label="Instagram foodequilibre">
              <i class="fab fa-instagram mr-2" aria-hidden="true"></i> Instagram foodequilibre
            </a>
          </li>
          <li class="mb-1">
            <a href="https://www.instagram.com/painetchocolat_asso/" class="flex items-center hover:text-gray-500" target="_blank" rel="noopener" itemprop="sameAs" title="Suivez Pain et Chocolat sur Instagram" aria-label="Instagram pain et chocolat">
              <i class="fab fa-instagram mr-2" aria-hidden="true"></i> Instagram pain et chocolat
            </a>
          </li>
        </ul>
      </div>
      <div class="px-2" itemscope itemtype="https://schema.org/LocalBusiness">
        <meta itemprop="name" content="Cabinet de Diététique - InstaRepas">
        <meta itemprop="image" content="{{ asset('imgs/logo_for_foodequlibre.webp') }}">
        <h4 class="text-base md:text-lg font-bold mb-2">Cabinet de Diététique</h4>
        <ul class="list-reset leading-tight text-black-600">
          <li class="mb-1" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
            <i class="fas fa-map-marker-alt mr-2" aria-hidden="true"></i>
            <a href="https://www.google.com/maps/search/?api=1&query=6+rue+de+plaisance+94130+Nogent+sur+Marne" target="_blank" rel="noopener" title="Voir l'adresse sur Google Maps">
              <span itemprop="streetAddress">6 rue de plaisance</span> 
              <span itemprop="postalCode">94130</span> 
              <span itemprop="addressLocality">Nogent sur Marne</span>
            </a>
          </li>
          <li class="mb-1">
            <i class="fas fa-phone mr-2" aria-hidden="true"></i>
            <a href="tel:+33148723595" itemprop="telephone" title="Appelez le cabinet de diététique" aria-label="Téléphone du cabinet">01.48.72.35.95</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="mt-4 border-t border-gray-200 pt-4 md:flex md:items-center md:justify-center">
      <p class="text-xs text-gray-800 font-normal text-center">
        Préparé avec <span aria-label="amour" role="img">💚</span> par <span class="text-green-500">InstaRepas <span aria-label="salade" role="img">🥗</span></span>
        <span class="hidden">© {{ date('Y') }} InstaRepas - Tous droits réservés</span>
      </p>
    </div>
  </div>
  
  <!-- Microdata pour le Sitemap -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ItemList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Accueil",
        "item": "{{ url('/') }}"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Contact",
        "item": "{{ url('/contact') }}"
      },
      {
        "@type": "ListItem",
        "position": 3,
        "name": "À propos",
        "item": "{{ url('/a-propos') }}"
      },
      {
        "@type": "ListItem",
        "position": 4,
        "name": "Mentions légales",
        "item": "{{ url(route('legal')) }}"
      }
    ]
  }
  </script>
</footer>