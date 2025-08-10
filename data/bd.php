<?php
// pour connexion
$serveur = "localhost";
$utilisateur = "root";           
$motDePasse = "";                
$baseDeDonnees = "salonbeauty";   

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees;charset=utf8mb4", $utilisateur, $motDePasse);
    
    // Définir les attributs PDO
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Mode de récupération des données

    
    echo "<p>Connexion réussie à la base de données '$baseDeDonnees' avec PDO !</p>";
} catch (PDOException $e) {
  
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}
?>

