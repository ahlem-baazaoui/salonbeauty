<?php
include(__DIR__ . '/../data/bd.php'); // connexion PDO

// Récupérer l'id du service à supprimer
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID du service non spécifié.");
}

// Supprimer le service
$stmt = $connexion->prepare("DELETE FROM services WHERE id = ?");
$success = $stmt->execute([$id]);

if ($success) {
    // Redirection vers la liste des services après suppression
    header("Location: lister_services.php?msg=Service supprimé avec succès");
    exit;
} else {
    echo "Erreur lors de la suppression du service.";
}
?>
