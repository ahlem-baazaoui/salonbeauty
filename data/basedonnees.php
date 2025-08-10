<?php
$serveur = "127.0.0.1";
$utilisateur = "root";
$motDePasse = "";

try {
    $connexion = new PDO("mysql:host=$serveur", $utilisateur, $motDePasse);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Créer la base si elle n'existe pas
    $connexion->exec("CREATE DATABASE IF NOT EXISTS salonbeauty CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $connexion->exec("USE salonbeauty");

    // Création des tables
    $sqlTables = "

    CREATE TABLE IF NOT EXISTS admins (
        username VARCHAR(50) UNIQUE NOT NULL,
        password_hash VARCHAR(255) NOT NULL
       
    );

      CREATE TABLE IF NOT EXISTS statuts_rdv (
            id INT AUTO_INCREMENT PRIMARY KEY,
            statut VARCHAR(50) NOT NULL UNIQUE
        );


    CREATE TABLE IF NOT EXISTS centres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_du_centre VARCHAR(100) NOT NULL,
    ville VARCHAR(100) NOT NULL,
    adresse TEXT,
    Téléphone VARCHAR(20),
    email VARCHAR(100)
                    
);


    CREATE TABLE IF NOT EXISTS contacts (
        id INT  PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        email VARCHAR(100) ,
        ville VARCHAR(100),
        tel VARCHAR(20),
        sujet VARCHAR(255),
        message TEXT
    );

    CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        tel VARCHAR(20),
        sujet VARCHAR(255),
        message TEXT,
        date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE IF NOT EXISTS services (
        id INT AUTO_INCREMENT PRIMARY KEY,
        centre_id INT NOT NULL,
        nom_service VARCHAR(100) NOT NULL,
        description TEXT,
        prix DECIMAL(10, 2),
        duree_estimee VARCHAR(50),
        FOREIGN KEY (centre_id) REFERENCES centres(id) ON DELETE CASCADE
    );

       CREATE TABLE IF NOT EXISTS rdv (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(100) NOT NULL,
            tel VARCHAR(20) NOT NULL,
            email VARCHAR(100),
            centre VARCHAR(50) NOT NULL,
            services TEXT NOT NULL,
            date_rdv DATE NOT NULL,
            heure_rdv TIME NOT NULL,
            notes TEXT,
            statut_id INT DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (statut_id) REFERENCES statuts_rdv(id)
    );


        CREATE TABLE IF NOT EXISTS rdv_services (
            rdv_id INT NOT NULL,
            service_id INT NOT NULL,
            PRIMARY KEY (rdv_id, service_id),
            FOREIGN KEY (rdv_id) REFERENCES rdv(id) ON DELETE CASCADE,
            FOREIGN KEY (service_id) REFERENCES services(id) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS accueil (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titre VARCHAR(255),
        texte TEXT,
        image VARCHAR(255),
        section VARCHAR(100),
        actif BOOLEAN DEFAULT 1
    );
    ";

    // Exécuter la création
    $connexion->exec($sqlTables);

    // Ajouter les statuts de RDV s'ils ne sont pas déjà là
    $connexion->exec("
        INSERT IGNORE INTO statuts_rdv (id, statut) VALUES
        (1, 'En attente'),
        (2, 'Confirmé'),
        (3, 'Annulé');
    ");

    echo "✅ Base 'salonbeauty' et toutes les tables créées avec succès.";

} catch (PDOException $e) {
    die("❌ Erreur : " . $e->getMessage());
}

$connexion = null;
?>

