<?php
include(__DIR__ . '/../data/bd.php');

// Récupérer l'ID depuis l'URL
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID du centre non spécifié.");
}

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $telephone = $_POST['tel_contact'];
    $email = $_POST['email'];

    $sql = "UPDATE centres SET nom = :nom, adresse = :adresse, ville = :ville, tel_contact = :telephone, email = :email WHERE id = :id";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':telephone' => $telephone,
        ':email' => $email,
        ':id' => $id
    ]);

    header("Location: lister_centres.php");
    exit();
}

// Récupérer les données du centre à modifier
$stmt = $connexion->prepare("SELECT * FROM centres WHERE id = :id");
$stmt->execute([':id' => $id]);
$centre = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$centre) {
    die("Centre non trouvé.");
}
?>

<!-- Formulaire similaire à celui de l'ajout, mais prérempli -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Centre</title>
    <style>
        /* Réutilise le style de ton formulaire précédent */
    </style>
</head>
<body>
<h1>Modifier le Centre</h1>
<form method="POST">
    <label for="nom">Nom du centre:</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($centre['nom']) ?>" required>

    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse" value="<?= htmlspecialchars($centre['adresse']) ?>">

    <label for="ville">Ville:</label>
    <input type="text" id="ville" name="ville" value="<?= htmlspecialchars($centre['ville']) ?>">

    <label for="tel_contact">Téléphone:</label>
    <input type="text" id="tel_contact" name="tel_contact" value="<?= htmlspecialchars($centre['tel_contact']) ?>">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($centre['email']) ?>">

    <button type="submit">Modifier</button>
</form>

<a href="lister_centres.php"> Retour</a>
</body>
</html>
