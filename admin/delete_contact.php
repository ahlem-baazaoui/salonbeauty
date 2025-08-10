<?php
include(__DIR__ . '/../data/bd.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $connexion->prepare("DELETE FROM contacts WHERE id = ?");
    $stmt->execute([$id]);

    // Redirige vers la liste
    header("Location: lister_contacts.php");
    exit;
} else {
    echo "ID invalide.";
}
?>
