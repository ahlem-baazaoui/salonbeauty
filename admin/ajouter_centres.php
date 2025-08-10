<?php
include __DIR__ . '/../data/bd.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $ville = $_POST['ville'] ?? '';
    $telephone = $_POST['tel_contact'] ?? '';
    $email = $_POST['email'] ?? '';
    $horaire = $_POST['horaire'] ?? '';
    $parking = $_POST['parking'] ?? '';
    $services = $_POST['services'] ?? '';
    $note = $_POST['note'] ?? null;
    $nb_avis = $_POST['nb_avis'] ?? null;

    $sql = "INSERT INTO centres 
        (nom, adresse, ville, tel_contact, email, horaire, parking, services, note, nb_avis)
        VALUES 
        (:nom, :adresse, :ville, :telephone, :email, :horaire, :parking, :services, :note, :nb_avis)";

    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        ':nom' => $nom,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':telephone' => $telephone,
        ':email' => $email,
        ':horaire' => $horaire,
        ':parking' => $parking,
        ':services' => $services,
        ':note' => $note,
        ':nb_avis' => $nb_avis
    ]);

    header("Location: lister_centres.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Centre</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f0e6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            color: #9c4b8b;
            text-align: center;
        }
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        textarea {
            resize: vertical;
            height: 80px;
        }
        button {
            margin-top: 20px;
            background-color: #ba9bc1;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #9c4b8b;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #9c4b8b;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h1>Ajouter un Centre</h1>
<form method="POST">
    <label for="nom">Nom du centre:</label>
    <input type="text" id="nom" name="nom" required>

    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse">

    <label for="ville">Ville:</label>
    <input type="text" id="ville" name="ville">

    <label for="tel_contact">Téléphone:</label>
    <input type="text" id="tel_contact" name="tel_contact">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <label for="horaire">Horaire:</label>
    <input type="text" id="horaire" name="horaire">

    <label for="parking">Parking:</label>
    <input type="text" id="parking" name="parking">

    <label for="services">Services (séparez par des virgules):</label>
    <textarea id="services" name="services"></textarea>

    <label for="note">Note (exemple: 4.5):</label>
    <input type="text" id="note" name="note">

    <label for="nb_avis">Nombre d'avis:</label>
    <input type="text" id="nb_avis" name="nb_avis">

    <button type="submit">Ajouter</button>
</form>

<a href="lister_centres.php">🔙 Retour à la liste des centres</a>

</body>
</html>
