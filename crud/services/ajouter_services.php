<?php
include(__DIR__ . '/../../data/bd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération sécurisée des données
    $nom = trim($_POST['nom'] ?? '');
    $tel = trim($_POST['tel'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $centre_nom = trim($_POST['centre'] ?? '');
    $services = $_POST['services'] ?? [];
    $date = $_POST['date'] ?? '';
    $heure = $_POST['heure'] ?? '';
    $notes = trim($_POST['notes'] ?? '');

    // Validation des champs obligatoires
    if (!$nom || !$tel || !$centre_nom || !$date || !$heure) {
        die('<p style="color:red;">Veuillez remplir tous les champs obligatoires.</p>');
    }

    if (!is_array($services) || count($services) === 0) {
        die('<p style="color:red;">Veuillez sélectionner au moins un service.</p>');
    }

    try {
        // 1. Récupérer ou insérer le centre
        $stmt_centre = $connexion->prepare("SELECT id FROM centres WHERE nom = ?");
        $stmt_centre->execute([$centre_nom]);
        $centre = $stmt_centre->fetch();

        if (!$centre) {
            $stmt_insert_centre = $connexion->prepare("INSERT INTO centres (nom) VALUES (?)");
            $stmt_insert_centre->execute([$centre_nom]);
            $centre_id = $connexion->lastInsertId();
        } else {
            $centre_id = $centre['id'];
        }

        // 2. Pour chaque service sélectionné, récupérer ou insérer
        $service_ids = [];
        $stmt_service_select = $connexion->prepare("SELECT id FROM services WHERE nom_service = ? AND centre_id = ?");
        $stmt_service_insert = $connexion->prepare("INSERT INTO services (nom_service, centre_id) VALUES (?, ?)");

        foreach ($services as $service_nom) {
            $service_nom = trim($service_nom);
            $stmt_service_select->execute([$service_nom, $centre_id]);
            $service = $stmt_service_select->fetch();

            if (!$service) {
                $stmt_service_insert->execute([$service_nom, $centre_id]);
                $service_ids[] = $connexion->lastInsertId();
            } else {
                $service_ids[] = $service['id'];
            }
        }

        // 3. Insérer un RDV par service
        $stmt_insert_rdv = $connexion->prepare("
            INSERT INTO rdv (nom_client, telephone_client, email_client, centre_id, service_id, date_rdv, heure_rdv, notes, statut_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $statut_id = 1; // statut par défaut

        foreach ($service_ids as $service_id) {
            $stmt_insert_rdv->execute([
                $nom,
                $tel,
                $email,
                $centre_id,
                $service_id,
                $date,
                $heure,
                $notes,
                $statut_id
            ]);
        }

        // Redirection après succès
        header('Location: ../../lister_services.php');
        exit();

    } catch (PDOException $e) {
        die('<p style="color:red;">Erreur lors de l\'ajout du rendez-vous : ' . htmlspecialchars($e->getMessage()) . '</p>');
    }
} else {
    echo '<p style="color:red;">Méthode non autorisée.</p>';
}
