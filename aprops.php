
<?php include('includes/header.php'); ?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>À propos – Wahiba Beauty</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f5f0e6;
      margin: 0;
      padding: 0;
      color: #4a3c47;
  
    }

    main {
      max-width: 800px;
      margin: 40px auto;
      padding: 0 20px;
    }

    main section h2 {
      text-align: center;
      color: #a66192;
      margin-bottom: 25px;
      font-weight: 700;
      font-size: 2.2rem;
    }

    main section p {
      border: 1.8px solid #a66192;
      border-radius: 8px;
      padding: 15px 20px;
      margin-bottom: 18px;
      background-color: #f9f5fa;
      font-size: 1.1rem;
      line-height: 1.6;
    }

    main section p strong {
      color: #824a6e;
    }

    .timeline-wrapper {
      position: relative;
      width: 100%;
      overflow-x: auto;
      padding: 100px 20px;
      background-color: #f5f0e6;
    }

    .timeline-line {
      position: absolute;
      top: 50%;
      left: 0;
      height: 4px;
      width: 100%;
      background-color: #a66192;
      z-index: 1;
    }

    .timeline {
      display: flex;
      justify-content: flex-start;
      position: relative;
      z-index: 2;
    }

    .timeline-event {
      position: relative;
      flex: 0 0 300px;
      margin-right: 100px;
      text-align: center;
      opacity: 0;
      transform: translateY(50px);
      transition: all 1s ease;
    }

    .timeline-event.active {
      opacity: 1;
      transform: translateY(0);
    }

    .timeline-circle {
      width: 60px;
      height: 60px;
      background-color: #a66192;
      color: white;
      border-radius: 50%;
      margin: 0 auto 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.2rem;
      box-shadow: 0 0 10px rgba(166, 97, 146, 0.4);
    }

    .timeline-card {
      background: white;
      border: 2px solid #a66192;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      font-family: 'Playfair Display', serif;
      background-image: linear-gradient(to bottom right, #f9f5fa, #fff);
    }

    .timeline-card h3 {
      color: #a66192;
      margin-bottom: 10px;
      font-size: 1.3rem;
    }

    .timeline-card p {
      color: #4a3c47;
      font-size: 1rem;
      line-height: 1.5;
    }

    .timeline-image {
  width: 100%;
  max-height: 200px;
  border-radius: 10px;
  margin-bottom: 12px;
  border: 2px solid #a66192;
  padding: 3px;
  object-fit: contain; /* ou 'cover' si tu veux que ça remplisse */
  background-color: #fff;
}


    @media (max-width: 768px) {
      .timeline-event {
        flex: 0 0 250px;
        margin-right: 50px;
      }
      .timeline-circle {
        width: 50px;
        height: 50px;
        font-size: 1rem;
      }
    }

    .timeline-wrapper::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>
<body>



<main>
  <section>
    <h2>À propos de Wahiba Beauty World</h2>
    <p><strong>Fondée en 1976</strong>, Wahiba Beauty World est aujourd’hui une marque emblématique de la beauté en Tunisie. Ce qui a commencé par une passion est devenu un groupe structuré, innovant et proche de ses clientes.</p>
    <p>Nous possédons aujourd’hui plusieurs branches : <strong>Wahiba Bridal World, Beauty World, Evening Dress, Talents Academy</strong> et une ligne de <strong>cosmétiques</strong>.</p>
    <p>Avec des centres à <strong>Sousse, Tunis, Mahdia, Jemmel</strong> et <strong>Djerba</strong>, Wahiba propose des prestations complètes : soins du visage et corps, maquillage, coiffure, location de robes et bien plus.</p>
  </section>
</main>

<!-- Timeline -->
<div class="timeline-wrapper">
  <div class="timeline-line"></div>
  <div class="timeline">

    <div class="timeline-event">
      <div class="timeline-circle">1976</div>
      <div class="timeline-card">
        <img src="imagess/1976.jpg" alt="Photo 1976" class="timeline-image" />
        <h3>Naissance de l'idée</h3>
        <p>Une passion familiale pour la beauté prend racine, marquant le début de l’aventure Wahiba World.</p>
      </div>
    </div>

    <div class="timeline-event">
      <div class="timeline-circle">1987</div>
      <div class="timeline-card">
        <img src="imagess/1987.jpg" alt="Photo 1987" class="timeline-image" />
        <h3>Premier salon</h3>
        <p>Ouverture du premier salon à Jemmel par M. Wahiba Ben Hafsa. Une vision devient réalité.</p>
      </div>
    </div>

    <div class="timeline-event">
      <div class="timeline-circle">2014</div>
      <div class="timeline-card">
        <img src="imagess/2014.jpg" alt="Photo 2014" class="timeline-image" />
        <h3>Nouvelle génération</h3>
        <p>Amel & Khaoula Amamou reprennent l’héritage Wahiba avec une vision moderne et ambitieuse.</p>
      </div>
    </div>

    <div class="timeline-event">
      <div class="timeline-circle">2023</div>
      <div class="timeline-card">
        <img src="imagess/2022.jpg" alt="Photo 2023" class="timeline-image" />
        <h3>Wahiba Group</h3>
        <p>Ouverture de centres à Tunis, Sousse et Jemmel. Une structure professionnelle est mise en place.</p>
      </div>
    </div>

    <div class="timeline-event">
      <div class="timeline-circle">2024</div>
      <div class="timeline-card">
        <img src="imagess/2024.png" alt="Photo 2024" class="timeline-image" />
        <h3>Expansion nationale</h3>
        <p>Djerba devient une franchise et Mahdia une filiale officielle. Wahiba devient une marque nationale.</p>
      </div>
    </div>

  </div>
</div>

<script>
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
      }
    });
  }, {
    threshold: 0.3
  });

  document.querySelectorAll('.timeline-event').forEach(event => {
    observer.observe(event);
  });
</script>

</body>
</html>

<?php include('includes/footer.php'); ?>