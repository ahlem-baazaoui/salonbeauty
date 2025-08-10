<?php
include __DIR__ . '/../../data/bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['titre'] ?? '');
    $texte = trim($_POST['texte'] ?? '');
    $section = $_POST['section'] ?? 'promo';

    if (empty($titre) || empty($texte)) {
        die("Le titre et le texte sont obligatoires.");
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../../images/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

        $tmpName = $_FILES['image']['tmp_name'];
        $originalName = basename($_FILES['image']['name']);
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extension, $allowed)) {
            die("Format d'image non autorisé. Formats acceptés : jpg, jpeg, png, gif.");
        }

        $newName = uniqid('promo_') . '.' . $extension;
        $destination = $uploadDir . $newName;

        if (move_uploaded_file($tmpName, $destination)) {
            $sql = "INSERT INTO accueil (titre, texte, image, section, actif) VALUES (:titre, :texte, :image, :section, 1)";
            $stmt = $connexion->prepare($sql);
            $stmt->execute([
                ':titre' => $titre,
                ':texte' => $texte,
                ':image' => $newName,
                ':section' => $section
            ]);
            // Redirection vers la liste après succès
            header('Location: ../../admin/lister_accueil.php');
            exit();
        } else {
            die("Erreur lors du déplacement de l'image.");
        }
    } else {
        die("Erreur lors de l'upload de l'image.");
    }
} else {
    // Redirection en cas d'accès direct via GET
    header('Location: ../../admin/lister_accueil.php');
    exit();
}
