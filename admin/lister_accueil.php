<?php
include __DIR__ . '/../data/bd.php';

// Récupérer les promos
$sqlPromo = "SELECT * FROM accueil WHERE actif = 1 AND section = 'promo' ORDER BY id DESC";
$promos = $connexion->query($sqlPromo)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Promotions - Admin</title>
  <style>
   .form-container {
  width: 400px;
  margin: 30px auto;
  padding: 20px;
  background-color: #fff7fb;
  border: 2px solid #e0c5d3;
  border-radius: 12px;
  box-shadow: 0 0 10px rgba(186, 155, 193, 0.3);
}

form {
  display: flex;
  flex-direction: column;
}

form label {
  font-weight: bold;
  margin-top: 10px;
  color: #6a2964;
}

form input[type="text"],
form textarea,
form input[type="file"] {
  margin-top: 5px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  background-color: #fff;
}

form textarea {
  resize: vertical;
}

form button {
  margin-top: 20px;
  padding: 12px;
  background-color: #ba9bc1;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

form button:hover {
  background-color: #a87bad;
}

  </style>
</head>
<body>
    

<h2>Ajouter une Promotion</h2>
<div class="form-container">
  <form action="../crud/accueil/ajouter_accueil.php" method="POST" enctype="multipart/form-data">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre" placeholder="Titre de la promotion" required>

    <label for="texte">Texte</label>
    <textarea name="texte" id="texte" placeholder="Texte de la promotion" rows="4" required></textarea>

    <label for="image">Image</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <input type="hidden" name="section" value="promo">

    <button type="submit">Ajouter la Promotion</button>
  </form>
</div>


  <section class="promotions">
    <h3>Nos Promotions</h3>
    <div class="promo-grid">
      <?php foreach ($promos as $promo): ?>
        <div class="promo-card">
          <img src="../images/<?= htmlspecialchars($promo['image']) ?>" alt="<?= htmlspecialchars($promo['titre']) ?>" class="promo-img">
          <div style="padding: 15px;">
            <h4><?= htmlspecialchars($promo['titre']) ?></h4>
            <p><?= nl2br(htmlspecialchars($promo['texte'])) ?></p>
            <form action="supprimer_accueil.php" method="POST" onsubmit="return confirm('Supprimer cette promotion ?');">
              <input type="hidden" name="id" value="<?= $promo['id'] ?>">
              <button type="submit" class="delete-button">Supprimer</button>
            </form>
            <form action="modifier_accueil.php" method="GET">
              <input type="hidden" name="id" value="<?= $promo['id'] ?>">
              <button type="submit" class="edit-button">Modifier</button>
            </form>
          
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

</body>
</html>

