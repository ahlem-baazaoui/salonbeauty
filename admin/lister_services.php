<?php
include(__DIR__ . '/../data/bd.php');

// Récupérer les centres
$centres = $connexion->query("SELECT * FROM centres")->fetchAll(PDO::FETCH_ASSOC);

// Filtrer par centre (GET)
$centre_id = isset($_GET['centre_id']) ? (int)$_GET['centre_id'] : null;

if ($centre_id) {
    $sql = "SELECT s.*, c.nom AS nom_centre 
            FROM services s 
            JOIN centres c ON s.centre_id = c.id 
            WHERE s.centre_id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$centre_id]);
} else {
    $sql = "SELECT s.*, c.nom AS nom_centre 
            FROM services s 
            JOIN centres c ON s.centre_id = c.id";
    $stmt = $connexion->query($sql);
}
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f7f4;
            margin: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: rgb(0, 0, 0);
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        select {
            padding: 5px 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: rgb(219, 172, 246);
            padding: 8px 12px;
            border-radius: 5px;
            margin-left: 10px;
        }

        a:hover {
            background-color: rgb(219, 172, 246);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color:rgb(236, 213, 242);
        }

        td a {
            padding: 5px 8px;
            margin: 0 2px;
            background-color:rgb(210, 223, 93);
            color: white;
            border-radius: 4px;
        }

        td a:hover {
            background-color: rgb(210, 223, 93);
        }

        td a:last-child {
            background-color: #dc3545;
        }

        td a:last-child:hover {
            background-color: #b52b38;
        }
    </style>
</head>
<body>
    <h1>Liste des services</h1>

    <form method="get">
        <label for="centre_id">Filtrer par centre :</label>
        <select name="centre_id" id="centre_id" onchange="this.form.submit()">
            <option value="">Tous les centres</option>
            <?php foreach ($centres as $centre): ?>
                <option value="<?= $centre['id'] ?>" <?= $centre_id == $centre['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($centre['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <a href="../crud/services/ajouter_services.php">➕ Ajouter un service</a>
    </form>

    <table>
        <tr>
            <th>Centre</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix (DT)</th>
            <th>Durée estimée</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($services as $s): ?>
            <tr>
                <td><?= htmlspecialchars($s['nom_centre']) ?></td>
                <td><?= htmlspecialchars($s['nom_service']) ?></td>
                <td><?= htmlspecialchars($s['description']) ?></td>
                <td><?= $s['prix'] ?> DT</td>
                <td><?= htmlspecialchars($s['duree_estimee']) ?></td>
                <td>
                    <a href="modifier_services.php?id=<?= $s['id'] ?>">Modifier</a>
                    <a href="delete_services.php?id=<?= $s['id'] ?>" onclick="return confirm('Confirmer la suppression ?')">delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
