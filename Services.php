<?php include('includes/header.php'); ?>
<style>
  body {
    background-color: #f5f0e6; /* beige clair */
    margin: 0;
    padding: 0;
  }
</style>
<?php
 include('data/bd.php'); 


// 1. Récupérer la ville depuis l'URL, par défaut Mahdia
$ville = $_GET['ville'] ?? 'Mahdia';

// 2. Récupérer tous les centres pour cette ville
$stmt = $connexion->prepare("SELECT * FROM centres WHERE ville = ?");
$stmt->execute([$ville]);
$centres = $stmt->fetchAll();

if (count($centres) === 0) {
    echo "<h2 style='text-align:center'>Ville inconnue ou aucun centre disponible à <strong>" . htmlspecialchars($ville) . "</strong></h2>";
    exit;
}
?>

<!-- Navigation dynamique -->
<nav style="text-align: center; margin: 30px 0;">
    <?php
    $villes = $connexion->query("SELECT DISTINCT ville FROM centres")->fetchAll();
    foreach ($villes as $v) {
        $nomVille = $v['ville'];
        $style = ($nomVille === $ville) ? "color:rgb(186, 155, 193); font-weight:bold;" : "color:#555;";
        echo "<a href='services.php?ville=" . urlencode($nomVille) . "' style='margin: 0 10px; text-decoration:none; {$style}'>" . htmlspecialchars($nomVille) . "</a>";
    }
    ?>
</nav>

<h1 style="text-align:center;">Nos Services à <?= htmlspecialchars($ville) ?></h1>

<section style="padding: 30px;">
    <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:20px;">
    <?php
    foreach ($centres as $centre) {
        $stmt2 = $connexion->prepare("SELECT * FROM services WHERE centre_id = ?");
        $stmt2->execute([$centre['id']]);
        $services = $stmt2->fetchAll();

        foreach ($services as $service) {
            echo "<div style='width:300px; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 8px rgba(0,0,0,0.1);'>";
            echo "<h3 style='color:rgb(186, 155, 193);'>" . htmlspecialchars($service['nom_service']) . "</h3>";
            echo "<p>" . htmlspecialchars($service['description']) . "</p>";
            echo "<p><strong>Prix :</strong> " . htmlspecialchars($service['prix']) . " DT</p>";
            echo "<p><strong>Durée :</strong> " . htmlspecialchars($service['duree_estimee']) . "</p>";
            // Lien "Réserver" avec prix ajouté dans l'URL
            echo "<a href='rdv.php?ville=" . urlencode($ville) 
                 . "&service=" . urlencode($service['nom_service']) 
                 . "&prix=" . urlencode($service['prix']) 
                 . "' style='background:#bc9bc1; color:white; padding:8px 15px; text-decoration:none; border-radius:5px;'>Réserver</a>";
            echo "</div>";
        }
        
    }
    ?>
    </div>
</section>
<?php include('includes/footer.php'); ?>