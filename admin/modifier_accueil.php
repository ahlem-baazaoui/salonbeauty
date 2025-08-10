<?php
include(__DIR__ . '/../data/bd.php'); // adapte selon emplacement

// Récupérer l'ID passé en GET
$id = $_GET['id'] ?? null;
if (!$id || !is_numeric($id)) {
    die("ID promotion invalide.");
}

// Récupérer la promo existante
$sql = "SELECT * FROM accueil WHERE id = :id AND section = 'promo'";
$stmt = $connexion->prepare($sql);
$stmt->execute([':id' => $id]);
$promo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$promo) {
    die("Promotion non trouvée.");
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['titre'] ?? '');
    $texte = trim($_POST['texte'] ?? '');

    if (empty($titre) || empty($texte)) {
        $error = "Le titre et le texte sont obligatoires.";
    } else {
        $imageName = $promo['image']; // garder l'image actuelle par défaut

        // Vérifier si une nouvelle image est uploadée
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../images/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

            $tmpName = $_FILES['image']['tmp_name'];
            $originalName = basename($_FILES['image']['name']);
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($extension, $allowed)) {
                // Générer un nom unique
                $newName = uniqid('promo_') . '.' . $extension;
                $destination = $uploadDir . $newName;

                if (move_uploaded_file($tmpName, $destination)) {
                    // Supprimer l'ancienne image si existe
                    if ($imageName && file_exists($uploadDir . $imageName)) {
                        unlink($uploadDir . $imageName);
                    }
                    $imageName = $newName;
                } else {
                    $error = "Erreur lors du téléchargement de l'image.";
                }
            } else {
                $error = "Format d'image non autorisé (jpg, jpeg, png, gif uniquement).";
            }
        }

        if (!isset($error)) {
            // Mise à jour en base
            $sqlUpdate = "UPDATE accueil SET titre = :titre, texte = :texte, image = :image WHERE id = :id";
            $stmtUpdate = $connexion->prepare($sqlUpdate);
            $stmtUpdate->execute([
                ':titre' => $titre,
                ':texte' => $texte,
                ':image' => $imageName,
                ':id' => $id,
            ]);

            // Redirection vers la liste
            header("Location:lister_accueil.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Modifier la Promotion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f6f2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        form {
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #b97fbf;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #6a2964;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            height: 120px;
        }
        .current-image {
            margin-top: 15px;
            text-align: center;
        }
        .current-image img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 8px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }
        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #ba9bc1;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #9d7aa8;
        }
        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #824a6e;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<form method="POST" enctype="multipart/form-data">
    <h1>Modifier la Promotion</h1>

    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($promo['titre']) ?>" required>

    <label for="texte">Texte :</label>
    <textarea id="texte" name="texte" required><?= htmlspecialchars($promo['texte']) ?></textarea>

    <label>Image actuelle :</label>
    <div class="current-image">
        <img src="../../images/<?= htmlspecialchars($promo['image']) ?>" alt="Image promo">
    </div>

    <label for="image">Changer d'image (optionnel) :</label>
    <input type="file" id="image" name="image" accept="image/*">

    <button type="submit">Modifier la promotion</button>

    <a href="lister_accueil.php">← Retour à la liste des promotions</a>
</form>

</body>
</html>
