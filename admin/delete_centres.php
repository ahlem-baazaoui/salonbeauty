<?php
include(__DIR__ . '/../data/bd.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID du centre manquant.");
}

// Suppression
$stmt = $connexion->prepare("DELETE FROM centres WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: lister_centres.php");
exit();
