<?php include('includes/header.php'); ?>

<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<p style="color: black;">Votre message a été envoyé avec succès ! Merci.</p>';
} elseif (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        echo '<p style="color: red;">Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.</p>';
    } elseif ($_GET['error'] == 2) {
        echo '<p style="color: red;">Veuillez remplir tous les champs obligatoires.</p>';
    }
}
?>



<style>
  body {
    background-color: #f5f0e6; /* beige clair */
    margin: 0;
    padding: 0;
  }
</style>


<section style="max-width: 1000px; margin: 50px auto; padding: 20px; display: flex; gap: 40px; flex-wrap: wrap;">

  <!-- Partie Contact à gauche -->
  <div style="flex: 1 1 400px; background:rgb(242, 236, 241); border-radius: 10px; padding: 30px; box-sizing: border-box;">
    <h1 style="text-align:center; color:rgb(186, 155, 193);">Contactez-nous</h1>
    <p style="text-align:center; margin-bottom: 30px;">
      Une question ? Un besoin particulier ? Notre équipe est à votre écoute pour vous offrir la meilleure expérience beauté.<br>
      Envoyez-nous un message, nous vous répondrons dans les 24h.
    </p>

    <form action="crud/contactt/ajouter_contact.php" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
      <label for="nom">Nom complet *</label>
      <input type="text" id="nom" name="nom" placeholder="Votre nom" required>

      <label for="email">Email *</label>
      <input type="email" id="email" name="email" placeholder="votre.email@exemple.com" required>

      <label for="tel">Téléphone</label>
      <input type="tel" id="tel" name="tel" placeholder="+216 XX XXX XXX" pattern="^\+216\s?\d{2}\s?\d{3}\s?\d{3}$">
      <label for="ville">Ville *</label>
      <select id="ville" name="ville" required>
            <option value="">-- Sélectionnez votre ville --</option>
            <option value="Mahdia">Mahdia</option>
            <option value="Sousse">Sousse</option>
            <option value="Jammel">Jammel</option>
            <option value="Djerba">Djerba</option>
            <option value="Tunis">Tunis</option>
      </select>

      <label for="sujet">Sujet</label>
      <input type="text" id="sujet" name="sujet" placeholder="Objet de votre message">

      <label for="message">Message *</label>
      <textarea id="message" name="message" rows="5" placeholder="Votre message..." required></textarea>

      <button type="submit" style="background:rgb(186, 155, 193); color:#fff; padding:12px; border:none; border-radius:5px; cursor:pointer; font-size:16px;">
        Envoyer le message
      </button>
      
    </form>
  </div>

  <!-- Partie Localisation à droite -->
  <div style="flex: 1 1 500px; background: rgb(242, 236, 241); border-radius: 10px; padding: 30px; box-sizing: border-box;">
    <h2 style="color:rgb(186, 155, 193); text-align:center; margin-bottom: 20px;">Nos centres - Localisation</h2>
    <!-- Infos compactes des centres -->
<div style="font-size: 14px; background: rgb(242, 236, 241); padding: 15px; border-radius: 8px; margin-bottom: 20px;">
  <strong style="display:block; text-align:center; color: rgb(186, 155, 193); font-size: 16px; margin-bottom:10px;"></strong>
  
  <ul style="list-style: none; padding: 0; margin: 0;">
    <li style="margin-bottom: 10px;">
      <strong>TUNIS :</strong> AOUINA — 
      <a href="tel:+21654163121" style="color: rgb(186, 155, 193); text-decoration: none;">+216 54 163 121</a>
    </li>
    <li style="margin-bottom: 10px;">
      <strong>SOUSSE :</strong> Hamem Sousse —
      <a href="tel:+21653290111" style="color: rgb(186, 155, 193); text-decoration: none;">+216 53 290 111</a>
    </li>
    <li style="margin-bottom: 10px;">
      <strong>MAHDIA :</strong> Av. Habib Bourguiba —
      <a href="tel:+21656551166" style="color: rgb(186, 155, 193); text-decoration: none;">+216 56 551 166</a>
    </li>
    <li style="margin-bottom: 10px;">
      <strong>JAMMEL :</strong> Rue Ibn El Jazzar —
      <a href="tel:+21622756296" style="color: rgb(186, 155, 193); text-decoration: none;">+216 22 756 296</a>
    </li>
    <li>
      <strong>DJERBA :</strong> Houmet Souk —
      <a href="tel:+21653492492" style="color: rgb(186, 155, 193); text-decoration: none;">+216 53 492 492</a>
    </li>
  </ul>
</div>

    <!-- Boutons villes -->
    <div style="text-align: center; margin-bottom: 20px;">
      <button onclick="changeMap('tunis')" style="margin: 0 5px; padding: 8px 15px; cursor:pointer; border: 1px solidrgb(186, 155, 193); border-radius: 5px; background: white; color: #cc6699;">Tunis</button>
      <button onclick="changeMap('sousse')" style="margin: 0 5px; padding: 8px 15px; cursor:pointer; border: 1px solid rgb(186, 155, 193); border-radius: 5px; background: white; color: #cc6699;">Sousse</button>
      <button onclick="changeMap('mahdia')" style="margin: 0 5px; padding: 8px 15px; cursor:pointer; border: 1px solid rgb(186, 155, 193); border-radius: 5px; background: white; color: #cc6699;">Mahdia</button>
      <button onclick="changeMap('jammel')" style="margin: 0 5px; padding: 8px 15px; cursor:pointer; border: 1px solid rgb(186, 155, 193); border-radius: 5px; background: white; color: #cc6699;">Jammel</button>
      <button onclick="changeMap('djerba')" style="margin: 0 5px; padding: 8px 15px; cursor:pointer; border: 1px solid rgb(186, 155, 193); border-radius: 5px; background: white; color: #cc6699;">Djerba</button>
    </div>

    <!-- Iframe carte -->
    <iframe id="mapFrame" 
        src="https://www.google.com/maps/search/Espace+Wahiba+beauty/@36.2413658,9.8453072,9z/data=!3m1!4b1?hl=fr&entry=ttu&g_ep=EgoyMDI1MDcwOS4wIKXMDSoASAFQAw%3D%3D" 
        width="100%" height="400" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

</section>

<script>
  const mapUrls = {
    tunis: "https://www.google.com/maps?q=Tunis+Wahiba+Beauty&output=embed",
    sousse: "https://www.google.com/maps?q=Sousse+Wahiba+Beauty&output=embed",
    mahdia: "https://www.google.com/maps?q=Mahdia+Wahiba+Beauty&output=embed",
    jammel: "https://www.google.com/maps?q=Jammel+Wahiba+Beauty&output=embed",
    djerba: "https://www.google.com/maps?q=Djerba+Wahiba+Beauty&output=embed"
  };

  function changeMap(city) {
    document.getElementById('mapFrame').src = mapUrls[city];
  }
</script>


<section style="max-width: 700px; margin: 40px auto; padding: 20px; background:rgb(242, 236, 241)9f9f9; border-radius: 10px;">
    <h2 style="color:rgb(194, 154, 208); text-align:center;">Informations générales</h2>
    <p style="text-align:center; font-size:18px; margin-bottom:10px;">
         Téléphone principal : <a href="tel:+216 54 163 121" style="color:rgb(0, 0, 0); text-decoration:none;">+216 54 057 496</a><br>
        Email : <a href="mailto:contact@salonwahiba.ma" style="color:rgb(0, 0, 0); text-decoration:none;">amamouamel0107@gmail.com</a><br>
        Service client : Lun-Sam 10h-19h
    </p>

    <div style="text-align:center; margin-top: 30px;">
        <h3>Suivez-nous</h3>
        <a href="https://www.instagram.com/wahiba_beauty_world?igsh=dHBycWM5ZGdyb2po" target="_blank" style="margin: 0 10px; color:rgb(0, 0, 0); text-decoration:none; font-weight:bold;">Instagram</a> |
        <a href="https://www.facebook.com/profile.php?id=100063718817073" target="_blank" style="margin: 0 10px; color:rgb(0, 0, 0); text-decoration:none; font-weight:bold;">Facebook</a>
    </div>
</section>
<?php include('./includes/footer.php'); ?>




