<?php
include(__DIR__ . '/../data/bd.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);
    if ($id > 0) {
        $sql = "DELETE FROM accueil WHERE id = :id";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
header('Location: lister_accueil.php');

exit();
