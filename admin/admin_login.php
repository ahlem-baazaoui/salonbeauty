<?php
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Connexion MySQLi
    $conn = new mysqli("localhost", "root", "", "salonbeauty");

    if ($conn->connect_error) {
        $error = "Erreur de connexion à la base de données : " . $conn->connect_error;
    } else {
        // Préparer la requête
        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password_hash'])) {
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_username'] = $user['username'];
                    header("Location: admin_dashboard.php");
                    exit();
                } else {
                    $error = "Nom d'utilisateur ou mot de passe incorrect.";
                }
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect.";
            }

            $stmt->close();
        } else {
            $error = "Erreur dans la préparation de la requête.";
        }
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Connexion Admin - Wahiba Beauty</title>
<style>
  body {
    background: #f0e6f6;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    height: 100vh;
    justify-content: center;
    align-items: center;
    margin: 0;
  }
  .login-container {
    background: white;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    width: 320px;
  }
  h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #6a4a86;
  }
  label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #5a3e7b;
  }
  input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px 10px;
    margin-bottom: 20px;
    border: 1.8px solid #b9a7d4;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.3s ease;
  }
  input[type="text"]:focus, input[type="password"]:focus {
    border-color: #6a4a86;
    outline: none;
  }
  button {
    width: 100%;
    background: #6a4a86;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    font-size: 17px;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  button:hover {
    background: #523f6d;
  }
  .error-message {
    background: #ffdddd;
    border: 1px solid #ff5c5c;
    color: #a70000;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
    text-align: center;
  }
</style>
</head>
<body>

<div class="login-container">
  <h2>Connexion Admin</h2>

  <?php if ($error): ?>
    <div class="error-message"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <label for="username">Nom d'utilisateur</label>
    <input type="text" id="username" name="username" required autofocus>

    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Se connecter</button>
  </form>
</div>

</body>
</html>
