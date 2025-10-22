<?php session_start(); ?>

<?php
session_start();

// Générer un token CSRF si pas déjà défini
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Couvreur Bordeaux</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


</head>
<body>

  <!-- Header -->
  <header class="header">
    <div class="header__logo">
      <img src="images/logo.png" alt="Logo Couvreur" />
    </div>

    <div class="header__icons">
      <a href="tel:+0640887968" aria-label="Téléphone"><i class="fas fa-phone"></i></a>
      <a href="mailto:contact@couvreur-bordeaux.com" aria-label="Message"><i class="fas fa-envelope"></i></a>
      <button id="btn-devis-header" aria-label="Demander un devis"><i class="fas fa-file-alt"></i></button>
      <button id="burger" aria-label="Menu"><i class="fas fa-bars"></i></button>
    </div>

    <nav class="header__nav" id="nav-menu">
      <ul class="header__menu">
        <li><a href="#services">Services</a></li>
        <li><a href="#realisations">Réalisations</a></li>
        <li><a href="#apropos">À propos</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>

  </header>

  <!-- Hero -->
  <section class="hero">
    <h1>Couvreur professionnel à Bordeaux</h1>
    <p><strong>Expertise & Fiabilité</strong></p>
    <p><strong>Auto-entrepreneur avec plus de 11 ans d’expérience</strong></p>
    <p>Je vous accompagne dans tous vos projets :</p>
<ul class="hero-list">
  <li>Toitures</li>
  <li>Zinguerie</li>
  <li>Fenêtres de toit</li>
  <li>Gouttières PVC & Zinc</li>
</ul>


    <button id="btn-devis" class="btn">Demander un devis gratuit</button>
  </section>

<!-- À propos -->
<section id="apropos" class="apropos">
  <h2>À propos</h2>
  <p>
    Fort de plus de <strong>11 ans d’expérience</strong> dans la couverture, je suis titulaire du diplôme <strong>CAP Couvreur</strong>, obtenu auprès des Compagnons du Devoir, avec une spécialisation en zinguerie.
  </p>
  <p>
    <strong>Basé en Gironde</strong>, et plus précisément autour de <strong>Bordeaux</strong>, j’interviens dans la métropole bordelaise et ses environs.
  </p>
  <p><strong>En choisissant mon savoir-faire, vous gagnez :</strong></p>
  <ul>
    <li><strong>Une expertise reconnue</strong> et un travail effectué dans les règles de l’art, pour une toiture durable et fiable.</li>
    <li><strong>Un intervenant local</strong>, rapide et réactif, qui connaît les spécificités climatiques et les exigences du secteur de Bordeaux.</li>
    <li><strong>Une solution adaptée</strong> à votre toiture, votre rénovation ou votre entretien, afin d’éviter des interventions multiples et coûteuses à l’avenir.</li>
  </ul>
  <p><strong>Mon objectif :</strong> vous offrir un service de confiance, privilégier la qualité et la longévité de votre toiture, pour votre tranquillité.</p>
</section>


  <!-- Services -->
  <section id="services" class="services">
  <h2>Mes Services</h2>
  <ul class="services-list">
    <li><a href="services/toiture.html" class="service-btn">Toiture : réparation et rénovation</a></li>
    <li><a href="services/nettoyage.html" class="service-btn">Nettoyage de toiture</a></li>
    <li><a href="services/zinguerie.html" class="service-btn">
      Zinguerie : Pose et réparation de chêneaux<br>
      &nbsp;&nbsp;- Entourages de cheminée<br>
      &nbsp;&nbsp;- Réalisation de noues<br>
      &nbsp;&nbsp;- Pose de rives métalliques<br>
      &nbsp;&nbsp;- Étanchéité des solins<br>
      &nbsp;&nbsp;- Installation de dalles d’évacuation<br>
      &nbsp;&nbsp;- Pose et entretien de descentes d’eau pluviales
    </a></li>
    <li><a href="services/gouttieres.html" class="service-btn">Gouttières (PVC et Zinc) : pose et nettoyage</a></li>
    <li><a href="services/velux.html" class="service-btn">Fenêtres de toit : pose de Velux</a></li>
  </ul>
</section>


  <!-- Réalisations -->
  <section class="realisations" id="realisations">
    <h2>Mes Réalisations</h2>
    <div class="carousel">
      <button class="carousel-btn prev" aria-label="Image précédente">&#8592;</button>
      <div class="carousel-track">
        <div class="carousel-item">
          <img src="images/realisations/toiture-renovee.jpg" alt="Toiture rénovée" />
          <h3>Toiture rénovée</h3>
          <p>Chantier complet avec tuiles neuves.</p>
        </div>
        <div class="carousel-item">
          <img src="images/realisations/charpente.jpg" alt="Charpente bois" />
          <h3>Charpente bois</h3>
          <p>Charpente traditionnelle renforcée.</p>
        </div>
        <div class="carousel-item">
          <img src="images/realisations/nettoyage.webp" alt="Nettoyage de toiture" />
          <h3>Nettoyage toiture</h3>
          <p>Traitement anti-mousse avec pulvérisation.</p>
        </div>
      </div>
      <button class="carousel-btn next" aria-label="Image suivante">&#8594;</button>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="contact">
    <h2>Contactez-moi</h2>
    <p>Adresse : 9 Rue de Condé, 33000 Bordeaux</p>
    <p>Téléphone : 06 40 88 79 68</p>
    <p>Email : <a href="mailto:alexandrefourquin@hotmail.fr">alexandrefourquin@hotmail.fr</a></p>

    <div id="form-devis" class="form-devis">
       <?php if (isset($_GET['message']) && $_GET['message'] === 'ok'): ?>
       <div class="message-confirmation">
          ✅ Votre message a bien été envoyé. Merci pour votre confiance.
       </div>
    <?php endif; ?>

      <form action="traitement-formulaire.php" method="POST">

      <!-- 🔒 Sécurité du formulaire -->
    <!-- Token anti-CSRF -->
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <!-- Champ caché anti-bots -->
    <input type="text" name="website" style="display:none">
    <h3>Formulaire de devis</h3>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required />

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required />

        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit" class="btn">Envoyer</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2025 — Couvreur Bordeaux. Tous droits réservés.</p>
  </footer>

  <!-- JS -->
  <script>
    // Toggle formulaire devis depuis bouton header et bouton hero
    const btnDevisHeader = document.getElementById('btn-devis-header');
    const btnDevis = document.getElementById('btn-devis');
    const formDevis = document.getElementById('form-devis');

    function toggleFormDevis() {
      if(formDevis.style.display === 'block') {
        formDevis.style.display = 'none';
        btnDevis.textContent = 'Demander un devis gratuit';
      } else {
        formDevis.style.display = 'block';
        btnDevis.textContent = 'Fermer le formulaire';
        formDevis.scrollIntoView({behavior: 'smooth'});
      }
    }

    btnDevisHeader.addEventListener('click', toggleFormDevis);
    btnDevis.addEventListener('click', toggleFormDevis);

    // Carrousel
    const track = document.querySelector('.carousel-track');
    const items = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');

    let currentIndex = 0;

    function updateCarousel() {
      const itemWidth = items[0].clientWidth;
      track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
    }

    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + items.length) % items.length;
      updateCarousel();
    });

    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % items.length;
      updateCarousel();
    });

    window.addEventListener('resize', updateCarousel);
    window.addEventListener('load', updateCarousel);

    // Burger menu slide
    const burger = document.getElementById('burger');
    const navMenu = document.getElementById('nav-menu');

    burger.addEventListener('click', () => {
      navMenu.classList.toggle('nav-active');
      burger.classList.toggle('active');
    });

    // Close menu on link click (optional)
    document.querySelectorAll('.header__menu a').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('nav-active');
        burger.classList.remove('active');
      });
    });

   

  // Si le message de confirmation est affiché, on le fait disparaître après 5 secondes
  const messageConfirmation = document.querySelector('.message-confirmation');
  if (messageConfirmation) {
    setTimeout(() => {
      messageConfirmation.style.display = 'none';
    }, 5000);
  }
</script>
</body>
</html>
