<?php 
include('includes/header.php'); 

// Inclure la connexion PDO (à adapter selon ton projet)
include('data/bd.php'); 

// Récupération du centre choisi en GET
$centre_nom = $_GET['centre'] ?? '';

// Récupération des services choisis par l'utilisateur (après soumission formulaire)
$servicesChoisis = $_GET['services'] ?? []; // tableau d'ids de services sélectionnés

// Récupérer la liste des services disponibles pour ce centre
if ($centre_nom) {
    $stmt = $connexion->prepare("SELECT id FROM centres WHERE nom_du_centre = ?");
    $stmt->execute([$centre_nom]);
    $centre = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($centre) {
        $centre_id = $centre['id'];
        $stmt2 = $connexion->prepare("SELECT id, nom_service, prix FROM services WHERE centre_id = ?");
        $stmt2->execute([$centre_id]);
        $services = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $services = [];
    }
} else {
    $services = [];
}
?>

<style>
  body {
    background-color: #f5f0e6; /* beige clair */
    margin: 0;
    padding: 0;
  }
  select[multiple] {
    height: 150px;
    width: 100%;
    padding: 10px;
    font-size: 16px;
  }
</style>

<?php


// Affichage des services sélectionnés (après soumission formulaire)
if (!empty($servicesChoisis)) {
    echo "Services sélectionnés : <br>";
    // Pour plus d'infos, tu peux récupérer leurs noms en base, ici on affiche juste les IDs
    foreach ($servicesChoisis as $serviceId) {
        echo "- Service ID : " . htmlspecialchars($serviceId) . "<br>";
    }
}
?>

<section style="max-width: 600px; margin: 50px auto; padding: 20px; background:rgb(242, 236, 241); border-radius: 10px;">
    <h1 style="text-align:center; color:rgb(202, 162, 182);">Prendre Rendez-vous</h1>
    <p style="text-align:center; margin-bottom: 40px;">
        Réservez votre moment de beauté en quelques clics. Choisissez votre centre, service et créneau préféré.
    </p>

    <form action="crud/Rdv/ajouter_rdv.php" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        <label for="nom">Nom complet *</label>
        <input type="text" id="nom" name="nom" placeholder="Votre nom" required>

        <label for="tel">Téléphone *</label>
        <input type="tel" id="tel" name="tel" placeholder="+216 XX XXX XXX" pattern="^\+216\s?\d{8}$" required>

        <label for="email">Email (optionnel)</label>
        <input type="email" id="email" name="email" placeholder="votre.email@exemple.com">

        <label for="centre">Centre *</label>
        <select id="centre" name="centre" required>
            <option value="">Choisissez votre centre</option>
            <option value="Centre TUNISIE" <?= ($centre_nom == 'Centre TUNISIE') ? 'selected' : '' ?>>Centre TUNISIE</option>
            <option value="Centre SOUSSE" <?= ($centre_nom == 'Centre SOUSSE') ? 'selected' : '' ?>>Centre SOUSSE</option>
            <option value="Centre MAHDIA" <?= ($centre_nom == 'Centre MAHDIA') ? 'selected' : '' ?>>Centre MAHDIA</option>
            <option value="Centre JAMMEL" <?= ($centre_nom == 'Centre JAMMEL') ? 'selected' : '' ?>>Centre JAMMEL</option>
            <option value="Centre DJERBA" <?= ($centre_nom == 'Centre DJERBA') ? 'selected' : '' ?>>Centre DJERBA</option>
        </select>

        <label for="services">Services *</label>
        <select name="services[]" id="services" multiple>
    <option value="">Sélectionnez vos services</option>
    <option value="Teinture simple court">Teinture simple court</option>
    <option value="Teinture simple long">Teinture simple long</option>
    <option value="Mèches court">Mèches court</option>
    <option value="Mèches long">Mèches long</option>
    <option value="Brushing court">Brushing court</option>
    <option value="Brushing long">Brushing long</option>
    <option value="Coupe femme">Coupe femme</option>
    <option value="Soin visage basique">Soin visage basique</option>
    <option value="Soin visage complet">Soin visage complet</option>
    <option value="Maquillage jour">Maquillage jour</option>
    <option value="Maquillage soirée">Maquillage soirée</option>
    <option value="Épilation sourcils">Épilation sourcils</option>
    <option value="Épilation jambes">Épilation jambes</option>
    <option value="Manucure classique">Manucure classique</option>
    <option value="Manucure semi-permanent">Manucure semi-permanent</option>
    <option value="Pédicure classique">Pédicure classique</option>
    <option value="Pédicure spa">Pédicure spa</option>
    <option value="Massage relaxant">Massage relaxant</option>
    <option value="Massage tonique">Massage tonique</option>
</select>

        <label for="date">Date *</label>
        <input type="date" id="date" name="date" required min="<?= date('Y-m-d') ?>">

        <label for="heure">Heure *</label>
        <input type="time" id="heure" name="heure" required min="10:00" max="20:00">

        <label for="notes">Notes (optionnel)</label>
        <textarea id="notes" name="notes" rows="3" placeholder="Précisions particulières, demandes spéciales..."></textarea>

        <button type="submit" style="background: rgb(186, 155, 193); color: #fff; padding: 12px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            Confirmer le rendez-vous
        </button>
    </form>
   
    <section style="margin-top: 50px; background:#f9f9f9; padding:20px; border-radius:8px; text-align:center;">
        <h3>Récapitulatif & Besoin d'aide ?</h3>
        <p>📞 <strong>+216 53 290 111</strong> SOUSSE</p>
        <p>📞 <strong>+216 54 163 121</strong> TUNISIE</p>
        <p>📞 <strong>+216 22 756 296</strong> JAMMEL</p>
        <p>📞 <strong>+216 53 492 492</strong> DJERBA</p>
        <p>📞 <strong>+216 56 551 166</strong> MAHDIA</p>
        <p>Service client disponible</p>
        <p>Notre équipe est là pour vous aider du lundi au samedi de 10h à 19h.</p>
    </section>
</section>


<?php include('includes/footer.php'); ?>
