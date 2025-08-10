<?php
// On remonte d’un niveau puis dans includes
include './includes/header.php';
?>
<style>
  body {
    background-color: #f5f0e6; /* beige clair */
    margin: 0;
    padding: 0;
  }
</style>


<!--  SECTION avec image de fond -->
<section id="accueil" style="
    text-align: center;
    padding: 70px 10px;
    background: url('./images/ahlem.jpg') center/cover no-repeat;
    color: #fff;
">
  <h1 style="font-size: 36px; text-shadow: 1px 1px 3px #000;">Excellence & Beauté</h1>
  <h2 style="font-size: 28px; margin-top: 10px; text-shadow: 1px 1px 3px #000;">Wahiba Beauty World</h2>
  <p style="font-size: 18px; max-width: 600px; margin: 20px auto; text-shadow: 1px 1px 3px #000;">
    Découvrez notre gamme complète de services de beauté, adaptés à vos besoins et réalisés par nos experts.
  </p>

 <!-- Bouton pour aller vers la page rd -->
 <a href="./rdv.php" 
   style="margin: 10px; padding: 12px 25px; background: rgb(186, 155, 193); 
          color: white; text-decoration: none; border-radius: 5px;">
      Prendre RDV
</a>


  <!-- Bouton pour aller vers la page Services -->
<a href="./Services.php" 
   style="margin: 10px; padding: 12px 25px; background: rgb(186, 155, 193); 
          color: white; text-decoration: none; border-radius: 5px;">
   Découvrir nos Services
</a>



</section>

  <section style="text-align: center; padding: 50px;background:#f5f0e6">
  <h2 style="font-size: 28px; color:rgb(0, 0, 0); margin-bottom: 30px;">Nos Services Wahiba en Tunisie</h2>

  <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">

    <!-- Tunis -->
  
    <a href="./Services.php?ville=Tunis" style="
      display: inline-block;
      width: 220px;
      padding: 25px 20px;
      background-color:rgba(64, 62, 63, 0.76);
      color: white;
      border-radius: 12px;
      text-decoration: none;
      font-size: 18px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    ">
      <strong> Tunis</strong><br>
      <span style="font-size:14px;">+100 mariées heureuses</span>
    </a>


    <!-- Sousse -->
 
    <a href="./Services.php?ville=Sousse"  style="
      display: inline-block;
      width: 220px;
      padding: 25px 20px;
      background-color:rgba(64, 62, 62, 0.76);
      color: white;
      border-radius: 12px;
      text-decoration: none;
      font-size: 18px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    ">
      <strong>Sousse</strong><br>
      <span style="font-size:14px;">+200 mariées élégantes</span>
    </a>

    <!-- Djerba -->
   

    <a href= "./Services.php?ville=Djerba"   style="
      display: inline-block;
      width: 220px;
      padding: 25px 20px;
      background-color:rgba(64, 62, 62, 0.76);
      color: white;
      border-radius: 12px;
      text-decoration: none;
      font-size: 18px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    ">
      <strong> Djerba</strong><br>
      <span style="font-size:14px;">+150 mariées enchantées</span>
    </a>

    <!-- Mahdia -->
    <a href="./Services.php?ville=Mahdia" style="
      display: inline-block;
      width: 220px;
      padding: 25px 20px;
      background-color:rgba(64, 62, 62, 0.76);
      color: white;
      border-radius: 12px;
      text-decoration: none;
      font-size: 18px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    ">
      <strong> Mahdia</strong><br>
      <span style="font-size:14px;">+400 mariées satisfaites</span>
    </a>

    <!-- Jammel -->
    <a href="./Services.php?ville=Jammel" style="
      display: inline-block;
      width: 220px;
      padding: 25px 20px;
      background-color:rgba(64, 62, 62, 0.76);
      color: white;
      border-radius: 12px;
      text-decoration: none;
      font-size: 18px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    ">
      <strong> Jammel</strong><br>
      <span style="font-size:14px;">+30 mariées comblées</span>
    </a>
    
  </div>
</section>

<!-- Ajoute effet hover -->
<style>
  .centre-card:hover {
    transform: scale(1.05);
  }
</style>



    <section style="background:#f5f0e6; padding: 50px 20px;">
    <h3 style="text-align:center; font-size: 26px;"> Services Populaires</h3>
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 30px; margin-top: 30px;">

        <!-- Coiffure -->
        <div style="border:1px solid #ddd; padding: 20px; border-radius:10px; width:250px; background:#fff;">
            <h4>Coiffure</h4>
            <p style="font-size:14px; color:#555;">
                Coupes, colorations et coiffages par nos experts :
                <ul style="padding-left: 18px; text-align: left; font-size: 13px; color: #666;">
                    <li>Coupe femme</li>
                    <li>Coloration</li>
                    <li>Mèches</li>
                    <li>Brushing</li>
                    <li>Babyliss</li>
                    <li>wavy</li>
                    <li>Chignon</li>
                </ul>
            </p>
            <strong>À partir de 150 DT</strong><br>
            <small>Durée : 1-4h</small><br><br>
            <div class="card">
    <!-- Contenu du cadre -->
    <div style="text-align: center; margin-top: 10px;">
        <a href="rdv.php" style="background:rgb(186, 155, 193); color:white; padding:8px 16px; text-decoration:none; border-radius:4px;">Réserver</a>
    </div>
</div>

        </div>

        <!-- Soins Visage -->
        <div style="border:1px solid #ddd; padding: 20px; border-radius:10px; width:250px; background:#fff;">
            <h4>Soins Visage</h4>
            <p style="font-size:14px; color:#555;">
                Traitements personnalisés pour votre peau :
                <ul style="padding-left: 18px; text-align: left; font-size: 13px; color: #666;">
                    <li>Nettoyage de peau</li>
                    <li>Hydratation</li>
                    <li>Anti-âge</li>
                    <li>Masques</li>
                    <li>Gommage</li>
                </ul>
            </p>
            <strong>À partir de 100 DT</strong><br>
            <small>Durée : 45min - 1h30</small><br><br>
            <div class="card">
    <!-- Contenu du cadre -->
    <div style="text-align: center; margin-top: 55px;">
        <a href="rdv.php" style="background:rgb(186, 155, 193); color:white; padding:8px 16px; text-decoration:none; border-radius:4px;">Réserver</a>
    </div>
</div>

        </div>

        <!-- Maquillage -->
        <div style="border:1px solid #ddd; padding: 20px; border-radius:10px; width:250px; background:#fff;">
            <h4>Maquillage</h4>
            <p style="font-size:14px; color:#555;">
                Maquillage professionnel pour tous événements :
                <ul style="padding-left: 18px; text-align: left; font-size: 13px; color: #666;">
                    <li>Maquillage jour</li>
                    <li>Maquillage enfant</li>
                    <li>Maquillage soirée</li>
                    <li>Maquillage mariée</li>
                    <li>Cours de maquillage</li>
                </ul>
            </p>
            <strong>À partir de 200 DT</strong><br>
            <small>Durée : 30min - 2h</small><br><br>
            <div class="card">
    <!-- Contenu du cadre -->
    <div style="text-align: center; margin-top: 40px;">
        <a href="rdv.php" style="background:rgb(186, 155, 193); color:white; padding:8px 16px; text-decoration:none; border-radius:4px;">Réserver</a>
    </div>
</div>

        </div>

        <!-- Épilation -->
        <div style="border:1px solid #ddd; padding: 20px; border-radius:10px; width:250px; background:#fff;">
            <h4>Épilation</h4>
            <p style="font-size:14px; color:#555;">
                Épilation douce et professionnelle :
                <ul style="padding-left: 18px; text-align: left; font-size: 13px; color: #666;">
                    <li>Épilation cire</li>
                    <li>Épilation orientale</li>
                    <li>Épilation Visage + masque</li>
                    <li>Jambes</li>
                    <li>Aisselles</li>
                </ul>
            </p>
            <strong>À partir de 50 DT</strong><br>
            <small>Durée : 15min - 1h</small><br><br>
            <div class="card">
    <!-- Contenu du cadre -->
    <div style="text-align: center; margin-top: 55px;">
        <a href="rdv.php" style="background:rgb(186, 155, 193); color:white; padding:8px 16px; text-decoration:none; border-radius:4px;">Réserver</a>
    </div>
</div>

        </div>

        <!-- Manucure -->
        <div style="border:1px solid #ddd; padding: 20px; border-radius:10px; width:250px; background:#fff;">
            <h4>Manucure & Pédicure</h4>
            <p style="font-size:14px; color:#555;">
                Soins complets pour vos ongles :
                <ul style="padding-left: 18px; text-align: left; font-size: 13px; color: #666;">
                    <li>Faux ongles</li>
                    <li>Gel naturel</li>
                    <li>Gel sur capsule</li>
                    <li>Gel baby boomer</li>
                    <li>Pose vernis normal</li>
                    <li> vernis permanent</li>
                </ul>
            </p>
            <strong>À partir de 70 DT</strong><br>
            <small>Durée : 30min - 1h30</small><br><br>
            <div class="card">
    <!-- Contenu du cadre -->
    <div style="text-align: center; margin-top: 10px;">
        <a href="rdv.php" style="background:rgb(186, 155, 193); color:white; padding:8px 16px; text-decoration:none; border-radius:4px;">Réserver</a>
    </div>
</div>

        </div>

        <!-- Soins Corps -->
        <div style="border:1px solid #ddd; padding: 20px; border-radius:10px; width:250px; background:#fff;">
            <h4>Soins Corps</h4>
            <p style="font-size:14px; color:#555;">
                Détente et bien-être pour votre corps :
                <ul style="padding-left: 18px; text-align: left; font-size: 13px; color: #666;">
                    <li>Massage relaxant</li>
                    <li>Massage Energitique</li>
                    <li>Gommage corps</li>
                    <li>Enveloppement</li>
                    <li>Hydratation</li>
                    <li>Massage argan</li>
                </ul>
            </p>
            <strong>À partir de 100 D</strong><br>
            <small>Durée : 45min - 1h30</small><br><br>
            <div class="card">
    <!-- Contenu du cadre -->
    <div style="text-align: center; margin-top: 10px;">
        <a href="rdv.php" style="background:rgb(186, 155, 193); color:white; padding:8px 16px; text-decoration:none; border-radius:4px;">Réserver</a>
    </div>
</div>

        </div>

    </div>
</section>

<?php
include 'data/bd.php'; // Connexion PDO

// Récupérer les promotions actives de la section 'promo'
$sqlPromo = "SELECT * FROM accueil WHERE actif = 1 AND section = 'promo' ORDER BY id DESC";
$promos =  $connexion->query($sqlPromo)->fetchAll(PDO::FETCH_ASSOC);
?>

<section style="padding: 40px 20px; background-color: #fff4f9;">
  <h3 style="text-align: center; font-size: 26px; color: #b14c8b; margin-bottom: 30px;">
    Nos Promotions
  </h3>

  <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
    <?php foreach ($promos as $promo): ?>
      <div style="width: 300px; background: white; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); overflow: hidden; transition: transform 0.3s;">
        <img src="./images/<?= htmlspecialchars($promo['image']) ?>" alt="<?= htmlspecialchars($promo['titre']) ?>" style="width: 100%; height: auto;">
        <div style="padding: 15px;">
          <h4 style="color: #824a6e; font-size: 18px; margin-bottom: 10px;"><?= htmlspecialchars($promo['titre']) ?></h4>
          <p style="font-size: 14px; color: #555;"><?= nl2br(htmlspecialchars($promo['texte'])) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>


<!-- ✅ Galerie photos avant les avis -->
<section style="padding: 40px 20px; background-color: #f5f0e6;">
  <h3 style="text-align: center; font-size: 26px; color: rgb(0, 0, 0); margin-bottom: 30px;">
    Moments Wahiba Beauty
  </h3>

  <style>
  .carousel {
    width: 100%;
    overflow: hidden;
    background: #f5f0e6;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    padding: 20px 0;
  }

  .carousel-track {
    display: flex;
    width: calc(300px * 10); /* nombre d’images * largeur */
    animation: scroll 20s linear infinite;
  }

  .carousel-track img {
    width: 300px;
    border-radius: 10px;
    margin-right: 15px;
    flex-shrink: 0;
    box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
  }

  .carousel-track img:hover {
    transform: scale(1.05);
  }

  /* Animation qui translate horizontalement de 0 à -50% (la moitié) */
  @keyframes scroll {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(-50%);
    }
  }
</style>

<div class="carousel">
  <div class="carousel-track">
    <!-- Pour un défilement infini, il faut répéter les images deux fois -->
    <img src="./images/galerie1.jpg" alt="Titre 1" />
    <img src="./images/galerie13.jpg" alt="Titre 13" />
    <img src="./images/galerie3.jpg" alt="Titre 3" />
    <img src="./images/galerie4.jpg" alt="Titre 4" />
    <img src="./images/galerie5.jpg" alt="Titre 5" />

    <!-- On répète ici les mêmes images -->
    <img src="./images/galerie6.jpg" alt="Titre 6" />
    <img src="./images/galerie7.jpg" alt="Titre 7" />
    <img src="./images/galerie8.jpg" alt="Titre 8" />
    <img src="./images/galerie9.jpg" alt="Titre 9" />
    <img src="./images/galerie10.jpg" alt="Titre 10" />
    <img src="./images/galerie11.jpg" alt="Titre 11" />
    
  </div>
</div>

</section>


<section style="background:#f5f0e6; padding: 50px 20px;">
    <h3 style="text-align:center; font-size: 26px; color:rgb(0, 0, 0);"> Avis de nos clientes</h3>
    
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 30px; margin-top: 30px; max-width: 1200px; margin: auto;">

        <!-- Avis 1 -->
        <div style="border:1px solid #eee; padding: 20px; border-radius:10px; width:300px; background:white;">
            <strong>Jouda Amal Nafouti</strong><br>
            <div style="color: #f7c944; font-size: 20px;">★★★★★</div>
            <p style="font-size: 13px; color: #888;">il y a 3 mois</p>
            <p style="font-style: italic;">
                Centre Wahiba Tunis ♥️ Un immense merci à toute l’équipe, avec une mention spéciale pour Sonia (Bismelleh machallah Ala ydayetha) ♥️
                Votre professionnalisme, votre bienveillance et votre sourire font toute la différence. Je suis plus que satisfaite du résultat. Chaari ifata9 🥰♥️
                Bravo et encore merci pour votre superbe travail !
            </p>
        </div>

        <!-- Avis 2 -->
        <div style="border:1px solid #eee; padding: 20px; border-radius:10px; width:300px; background:white;">
            <strong>Maissa Hajmabrouk</strong><br>
            <div style="color: #f7c944; font-size: 20px;">★★★★★</div>
            <p style="font-size: 13px; color: #888;">il y a 1 mois</p>
            <p style="font-style: italic;">
                Un grand merci à toute l’équipe du Centre de coiffure Espace Wahiba pour leur accueil chaleureux et leur excellent service ! 
                Le maquillage était magnifique, parfaitement réalisé pour chacune d’entre nous. Merci pour votre professionnalisme et votre gentillesse.
            </p>
        </div>

        <!-- Avis 3 -->
        <div style="border:1px solid #eee; padding: 20px; border-radius:10px; width:300px; background:white;">
            <strong>Anaghim Ben Souissi</strong><br>
            <div style="color: #f7c944; font-size: 20px;">★★★★★</div>
            <p style="font-size: 13px; color: #888;">il y a 3 semaines</p>
            <p style="font-style: italic;">
                Aujourd’hui, j’ai réalisé un balayage chez Wahiba Centre et je tiens à remercier Sihem, la coiffeuse qui s’est occupée de moi 💗 
                Elle est très professionnelle, gentille et aimable. Grâce à son savoir-faire, mes cheveux sont devenus sublimes !
            </p>
        </div>

    </div>

    <div style="text-align: center; margin-top: 40px;">
  <a href="https://www.google.com/search?client=safari&sca_esv=873f597c83ac3191&rls=en&si=AMgyJEvkVjFQtirYNBhM3ZJIRTaSJ6PxY6y1_6WZHGInbzDnMS7JaUILf1qIvvQq4DBhJ0lJ4FiODak0Ts2hFn7Sk6lIk9Ny3aJgzN2qIWWdgK54uO-H6ZwIjTVKuG4ZU2XGH5gvEdiaQgIX0ibccIp2IWoHConaYQ%3D%3D&q=Espace+Wahiba+show+room+Avis&sa=X&ved=2ahUKEwiQjsuT2bCOAxUISfEDHfj9HtgQ0bkNegQIMhAD&biw=1536&bih=695&dpr=1.25"
     target="_blank" 
     style="color: #000; text-decoration: underline;">
       Voir tous les avis Google
  </a>
</div>
</section>


<section style="text-align:center; padding:50px; background:#f5f0e6;">
    <h2 style="color:rgb(0, 0, 0);">Prête pour votre transformation ?</h2>
    <p style="color:#333;">Réservez dès maintenant dans l'un de nos centres et découvrez l'excellence Wahiba Beauty</p>
    <?php
$villes = ["Tunis", "Sousse", "Mahdia", "Jammel", "Djerba"];
foreach ($villes as $ville) {
    echo "<a href='./rdv.php?service=Coiffure&ville=$ville' style='margin: 10px; padding: 12px 25px; background: rgb(186, 155, 193); color: white; text-decoration: none; border-radius: 5px;'>Prendre RDV à $ville</a> ";
}
?>
</section>



<!-- Style global pour le zoom sur les icônes -->
<style>
    a img:hover {
        transform: scale(1.2);
    }
</style>


<?php include('includes/footer.php'); ?>