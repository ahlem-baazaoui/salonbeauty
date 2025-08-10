<?php
include(__DIR__ . '/../data/bd.php'); 
$centres = $connexion->query("SELECT * FROM centres")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Centres Wahiba Beauty</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f4f0;
            margin: 20px;
            color: #333;
        }
        h1 {
            color: #ba68c8;
            margin-bottom: 20px;
        }
        a.btn-ajouter {
            display: inline-block;
            padding: 8px 15px;
            background-color: #ba68c8;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-bottom: 20px;
        }
        a.btn-ajouter:hover {
            background-color: #9c27b0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2e5f7;
            color: #5e35b1;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .actions a {
            color: #007bff;
            margin-right: 8px;
            text-decoration: none;
        }
        .actions a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Centres Wahiba Beauty</h1>
<a href="ajouter_centres.php" class="btn-ajouter">➕ Ajouter un centre</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Horaire</th>
            <th>Parking</th>
            <th>Services</th>
            <th>Note</th>
            <th>Nombre d'avis</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($centres as $centre): ?>
        <tr>
            <td><?= htmlspecialchars($centre['id']) ?></td>
            <td><?= htmlspecialchars($centre['nom']) ?></td>
            <td><?= htmlspecialchars($centre['adresse']) ?></td>
            <td><?= htmlspecialchars($centre['ville']) ?></td>
            <td><?= htmlspecialchars($centre['tel_contact']) ?></td>
            <td><?= htmlspecialchars($centre['email']) ?></td>
            <td><?= htmlspecialchars($centre['horaire']) ?></td>
            <td><?= htmlspecialchars($centre['parking']) ?></td>
            <td style="max-width: 200px;"><?= nl2br(htmlspecialchars($centre['services'])) ?></td>
            <td><?= htmlspecialchars($centre['note']) ?></td>
            <td><?= htmlspecialchars($centre['nb_avis']) ?></td>
            <td class="actions">
                <a href="modifier_centres.php?id=<?= urlencode($centre['id']) ?>">Modifier</a> |
                <a href="delete_centres.php?id=<?= urlencode($centre['id']) ?>" onclick="return confirm('Confirmer la suppression ?');">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
