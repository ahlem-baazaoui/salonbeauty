<?php
// Config connexion base
$serveur = "127.0.0.1";
$utilisateur = "root";
$motDePasse = "";
$base = "salonbeauty";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$base;charset=utf8mb4", $utilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération sécurisée des données POST
    $nom = $_POST['nom'] ?? null;
    $tel = $_POST['tel'] ?? null;
    $email = $_POST['email'] ?? null;
    $centre = $_POST['centre'] ?? null;
    $date_rdv = $_POST['date'] ?? null;
    $heure_rdv = $_POST['heure'] ?? null;
    $notes = $_POST['notes'] ?? null;
    $services = $_POST['services'] ?? [];

    // Vérifications basiques
    if (!$nom || !$tel || !$centre || !$date_rdv || !$heure_rdv || empty($services)) {
        throw new Exception("Merci de remplir tous les champs obligatoires et de sélectionner au moins un service.");
    }

    // Insertion dans la table rdv
    $stmt = $connexion->prepare("INSERT INTO rdv (nom, tel, email, centre, date_rdv, heure_rdv, notes) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $tel, $email, $centre, $date_rdv, $heure_rdv, $notes]);

    // Récupérer l'id du rdv inséré
    $rdv_id = $connexion->lastInsertId();

    $stmtServiceId = $connexion->prepare("SELECT id FROM services WHERE nom_service = ? LIMIT 1");
$stmtServiceId->execute([$service_nom]);
$service = $stmtServiceId->fetch(PDO::FETCH_ASSOC);

if ($service) {
    $service_id = $service['id']; // pas 'services' !
    $stmtInsertRdvService = $connexion->prepare("INSERT INTO rdv_services (rdv_id, service_id) VALUES (?, ?)");
    $stmtInsertRdvService->execute([$rdv_id, $service_id]);
}

    echo "✅ Rendez-vous enregistré avec succès !";

} catch (Exception $e) {
    echo "❌ Erreur : " . $e->getMessage();
}
?>
