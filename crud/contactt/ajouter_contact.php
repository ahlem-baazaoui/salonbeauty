<?php
include __DIR__ . '/../../data/bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $tel = trim($_POST['tel'] ?? '');
    $ville = trim($_POST['ville'] ?? '');
    $sujet = trim($_POST['sujet'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($nom !== '' && $email !== '' && $ville !== '' && $message !== '') {
        try {
            $sql = "INSERT INTO contacts (nom, email, tel, sujet, message, ville) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([$nom, $email, $tel, $sujet, $message, $ville]);

            header("Location: ../../contact.php?success=1");
            exit();
        } catch (PDOException $e) {
            header("Location: ../../contact.php?error=1");
            exit();
        }
    } else {
        header("Location: ../../contact.php?error=2");
        exit();
    }
} else {
    header("Location: ../../contact.php");
    exit();
}
?>




