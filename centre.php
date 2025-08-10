<?php include('includes/header.php'); ?>

<style>
  body {
    background-color: #f5f0e6;
    margin: 0;
    padding: 0;
   
  }
  .centre-card {
    border:1px solid #ddd;
    border-radius:10px;
    padding:20px;
    width:300px;
    background:#fff;
    box-sizing: border-box;
    margin-bottom: 30px;
    transition: box-shadow 0.3s;
  }
  .centre-card:hover {
    box-shadow: 0 4px 8px rgba(186, 155, 193, 0.3);
  }
  .btn-reserver {
    display:inline-block;
    margin-top: 10px;
    padding: 8px 16px;
    background:rgb(186, 155, 193);
    color: white;
    text-decoration:none;
    border-radius:5px;
  }
</style>

<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=salonbeauty;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer tous les centres
    $stmt = $pdo->query("SELECT * FROM centres");
    $centres = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Cast parking en booléen
    foreach ($centres as &$centre) {
        $centre['parking'] = (bool) ($centre['parking'] ?? false);
    }
    unset($centre);

    // Récupérer tous les services groupés par centre_id
    $stmtServices = $pdo->query("SELECT centre_id, nom_service FROM services");
    $servicesParCentre = [];
    while ($row = $stmtServices->fetch(PDO::FETCH_ASSOC)) {
        $servicesParCentre[$row['centre_id']][] = $row['nom_service'];
    }

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>

<!-- Section Titre -->
<section style="text-align: center; padding: 60px 20px; background:rgb(238, 230, 245);">
    <h1 style="font-size: 36px; color: rgb(186, 155, 193); margin-bottom: 15px;">Nos Centres</h1>
    <p style="font-size: 18px; max-width: 700px; margin: auto;">
        Trouvez le centre Wahiba Beauty le plus proche de vous. Chaque centre offre une expérience unique avec des services adaptés.
    </p>
</section>

<!-- Section Centres -->
<section style="padding: 50px 20px;">
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
        <?php foreach ($centres as $centre) : ?>
            <div class="centre-card" id="centre_<?= htmlspecialchars($centre['id']) ?>">
                <h3 style="color:rgb(186, 155, 193); margin-bottom: 10px;"><?= htmlspecialchars($centre['nom']) ?></h3>
                <p>
                    <strong><?= htmlspecialchars($centre['type'] ?? 'Type non défini') ?></strong> – 
                    <?= htmlspecialchars($centre['note'] ?? 'N/A') ?> (<?= htmlspecialchars($centre['nb_avis'] ?? '0') ?> avis)
                </p>
                <p><?= htmlspecialchars($centre['adresse']) ?>, <?= htmlspecialchars($centre['ville']) ?></p>
                <p>📞 <?= htmlspecialchars($centre['tel_contact'] ?? 'Téléphone non disponible') ?></p>
                <p>⏰ <?= htmlspecialchars($centre['horaire'] ?? 'Horaires non définis') ?></p>
                <?php if ($centre['parking']) : ?>
                    <p style="color: green; font-weight: bold;">Parking disponible</p>
                <?php endif; ?>

                <h4 style="margin-top: 15px;">Services disponibles :</h4>
                <ul style="padding-left: 20px;">
                    <?php foreach ($servicesParCentre[$centre['id']] ?? [] as $service) : ?>
                        <li><?= htmlspecialchars($service) ?></li>
                    <?php endforeach; ?>
                </ul>

                <a href="rdv.php" class="btn-reserver">Réserver</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Pourquoi choisir -->
<section style="padding: 50px 20px; text-align:center; background:rgb(238, 230, 245);">
    <h2 style="margin-bottom: 40px;">Pourquoi choisir nos centres ?</h2>
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 40px;">
        <div style="width: 250px;">
            <h3>Proximité</h3>
            <p>Centres stratégiquement situés en Tunisie</p>
        </div>
        <div style="width: 250px;">
            <h3>Qualité</h3>
            <p>Même excellence dans tous nos centres</p>
        </div>
        <div style="width: 250px;">
            <h3>Accessibilité</h3>
            <p>Tarifs adaptés à tous les budgets</p>
        </div>
    </div>
</section>



<?php include('includes/footer.php'); ?>
