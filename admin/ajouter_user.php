<?php
$pdo = new PDO("mysql:host=localhost;dbname=salonbeauty", "root", "");

$username = "admin";
$password = "Wahiba"; // mot de passe en clair
$email = "admin@example.com";
$role = "admin";

// Sécuriser le mot de passe
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, password_hash, email, role) VALUES (?, ?, ?, ?)");
$stmt->execute([$username, $password_hash, $email, $role]);

echo "Utilisateur ajouté avec succès.";
?>
