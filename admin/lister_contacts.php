<?php
include(__DIR__ . '/../data/bd.php');

$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!$connexion) {
    die("Erreur de connexion à la base de données.");
}

try {
    $sql = "SELECT * FROM contacts";
    $stmt = $connexion->query($sql);
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des contacts : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color:rgb(219, 172, 246);
            color: white;
        }

        td {
            background-color: #fff;
        }

        a {
            padding: 6px 12px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        a.delete {
            background-color:rgb(219, 118, 128);
        }

        a.add {
            display: inline-block;
            margin: 15px auto;
            background-color:rgb(167, 224, 141);
        }

        .center {
            text-align: center;
        }

        .no-data {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin: 20px auto;
            width: 50%;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h2>Liste des Contacts</h2>

<div class="center">
    <a href="../crud/contactt/ajouter_contact.php" class="add">Ajouter un contact</a>
</div>

<?php if (count($contacts) > 0): ?>
<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Message</th>
        <th>Ville</th> <!-- 🟢 colonne ville correctement placée -->
        <th>Actions</th>
    </tr>

    <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?= $contact['id'] ?></td>
            <td><?= htmlspecialchars($contact['nom']) ?></td>
            <td><?= htmlspecialchars($contact['email']) ?></td>
            <td><?= htmlspecialchars($contact['message']) ?></td>
            <td><?= htmlspecialchars($contact['ville'] ?? '') ?></td> <!-- 🟢 affichage de ville -->
            <td>
                <a class="delete" href="delete_contact.php?id=<?= $contact['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce contact ?');">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
    <div class="no-data center">Aucun contact trouvé dans la base de données.</div>
<?php endif; ?>

</body>
</html>
