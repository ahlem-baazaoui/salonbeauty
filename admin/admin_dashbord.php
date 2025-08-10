<?php
session_start();

// Vérifier si admin connecté
if (!isset($_SESSION['admin_id'])) {
    header('Location: login_admin.php'); // rediriger vers login si pas connecté
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Tableau de bord Admin - Wahiba Beauty</title>
</head>
<body>
    <h1>Bienvenue <?= htmlspecialchars($_SESSION['admin_username']) ?> !</h1>

    <nav>
        <ul>
            <li><a href="liste_centres.php">Gestion des centres</a></li>
            <li><a href="liste_services.php">Gestion des services</a></li>
            <li><a href="liste_rdv.php">Gestion des rendez-vous</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>

    <p>Ici tu peux gérer toutes les données de ton site.</p>
</body>
</html>
