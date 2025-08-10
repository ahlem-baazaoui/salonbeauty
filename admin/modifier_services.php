<?php
include(__DIR__ . '/../data/bd.php');

// Récupérer l'id du service à modifier
$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID du service non spécifié.");
}

// Initialisation des variables
$error = '';
$success = '';

// Récupérer la liste des centres pour le select
$centres = $connexion->query("SELECT * FROM centres")->fetchAll(PDO::FETCH_ASSOC);

// Si formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_service = $_POST['nom_service'] ?? '';
    $description = $_POST['description'] ?? '';
    $prix = $_POST['prix'] ?? null;
    $duree_estimee = $_POST['duree_estimee'] ?? '';
    $centre_id = $_POST['centre_id'] ?? null;

    // Validation simple (à améliorer si besoin)
    if (!$nom_service || !$prix || !$centre_id) {
        $error = "Veuillez remplir tous les champs obligatoires.";
    } else {
        // Mettre à jour en base
        $sql = "UPDATE services SET nom_service = ?, description = ?, prix = ?, duree_estimee = ?, centre_id = ? WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$nom_service, $description, $prix, $duree_estimee, $centre_id, $id]);
        $success = "Service modifié avec succès.";
    }
}

// Récupérer les données actuelles du service
$stmt = $connexion->prepare("SELECT * FROM services WHERE id = ?");
$stmt->execute([$id]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$service) {
    die("Service non trouvé.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f0e6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            color: #ba9bc1;
            margin-bottom: 20px;
        }
        form {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            max-width: 500px;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #5a3e6d;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            border-color: #ba9bc1;
            outline: none;
        }
        textarea {
            resize: vertical;
            min-height: 80px;
        }
        button {
            background-color: #ba9bc1;
            border: none;
            padding: 12px 20px;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #a078b1;
        }
        p {
            font-size: 14px;
        }
        p a {
            color: #ba9bc1;
            text-decoration: none;
        }
        p a:hover {
            text-decoration: underline;
        }
        .error {
            color: #d9534f;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .success {
            color: #5cb85c;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Modifier service</h1>

    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="nom_service">Nom du service :</label>
        <input type="text" id="nom_service" name="nom_service" value="<?= htmlspecialchars($service['nom_service']) ?>" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description"><?= htmlspecialchars($service['description']) ?></textarea>

        <label for="prix">Prix (DT) :</label>
        <input type="number" step="0.01" id="prix" name="prix" value="<?= htmlspecialchars($service['prix']) ?>" required>

        <label for="duree_estimee">Durée estimée :</label>
        <input type="text" id="duree_estimee" name="duree_estimee" value="<?= htmlspecialchars($service['duree_estimee']) ?>">

        <label for="centre_id">Centre :</label>
        <select name="centre_id" id="centre_id" required>
            <option value="">-- Choisir un centre --</option>
            <?php foreach ($centres as $centre): ?>
                <option value="<?= $centre['id'] ?>" <?= ($service['centre_id'] == $centre['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($centre['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Enregistrer les modifications</button>
    </form>

    <p><a href="lister_services.php">← Retour à la liste des services</a></p>
</body>
</html>
