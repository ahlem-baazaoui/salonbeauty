<?php
include(__DIR__ . '/../data/bd.php');

// Requête principale sans service (car services sont gérés via rdv_services)
$sql = "
    SELECT 
        rdv.id,
        rdv.nom_client,
        rdv.telephone_client,
        rdv.email_client,
        centres.nom AS nom_centre,
        rdv.date_rdv,
        rdv.heure_rdv,
        rdv.notes,
        statuts_rdv.statut AS statut_rdv
    FROM rdv
    JOIN centres ON rdv.centre_id = centres.id
    JOIN statuts_rdv ON rdv.statut_id = statuts_rdv.id
    ORDER BY rdv.date_rdv DESC, rdv.heure_rdv DESC
";

$stmt = $connexion->query($sql);
$rdvs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Rendez-vous</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f6f8;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #ba9bc1;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background: #fff;
            box-shadow: 0 0 10px #ccc;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #ba9bc1;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Liste des Rendez-vous</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Centre</th>
            <th>Services</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Notes</th>
            <th>Statut</th>
        </tr>
        <?php foreach ($rdvs as $rdv): ?>
            <?php
            // Récupération des services pour ce RDV via table pivot
            $stmtServices = $connexion->prepare("
                SELECT s.nom 
                FROM rdv_services rs
                JOIN services s ON rs.service_id = s.id
                WHERE rs.rdv_id = ?
            ");
            $stmtServices->execute([$rdv['id']]);
            $services = $stmtServices->fetchAll(PDO::FETCH_COLUMN);
            ?>
            <tr>
                <td><?= htmlspecialchars($rdv['nom_client']) ?></td>
                <td><?= htmlspecialchars($rdv['telephone_client']) ?></td>
                <td><?= htmlspecialchars($rdv['email_client']) ?></td>
                <td><?= htmlspecialchars($rdv['nom_centre']) ?></td>
                <td><?= htmlspecialchars(implode(', ', $services)) ?></td>
                <td><?= htmlspecialchars($rdv['date_rdv']) ?></td>
                <td><?= htmlspecialchars($rdv['heure_rdv']) ?></td>
                <td><?= htmlspecialchars($rdv['notes']) ?></td>
                <td><?= htmlspecialchars($rdv['statut_rdv']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
