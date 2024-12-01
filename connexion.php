<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Around | Connexion</title>
    <link rel="stylesheet" href="amisStyle.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="connexion.css">
    <script src="navbar.js" defer></script>
    <script src="connexion.js" defer></script>
</head>
<body>
    <nav class="navbar">
        <div class="h1_nav">
            <h1>Around</h1>
        </div>
        <div class="lien_intra_site">
            <ul class="navbarul">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#">Découvrir</a></li>
                <li><a href="pageAmis.html">Amis</a></li>
            </ul>
        </div>
        <div class="search_notif_profile">
            <div class="navSearch">
                <input type="text" placeholder="Search" class="navSearchInput">
                <button class="navSearchButton">
                    <img src="img/search.svg" alt="Rechercher">
                </button>
            </div>
            <img src="img/bell.svg" class="notification_bell">
            <div class="pfp_navbar_div">
                <a href="profil.html" id="profilImg">
                    <img src="img/anonym.png" class="pfp_navbar" alt="Mon profil" title="Profil">
                </a>
            </div>
            <img src="img/square-menu.svg" alt="Menu" class="menu-burger">
        </div>
    </nav>
    <div class="navSearch-mobile">
        <input type="text" placeholder="Search" class="navSearchInput-mobile">
        <button class="navSearchButton-mobile">
            <img src="img/search.svg" alt="Rechercher">
        </button>
    </div>
    <div class="connexion">
        <h1>Connexion</h1>
        <form action="" method="post">
            <div class="mail-container">
                <img src="img/mail.svg" alt="user" class="user">
                <label for="email">Adresse mail</label>
            </div>
            <input type="email" name="email" id="email" placeholder="Votre adresse mail" required>
            <div class="pass-container">
                <img src="img/lock.svg" alt="lock" class="lock">
                <label for="password">Mot de passe</label>
            </div>
            <div class="password-container">
                <input type="password" name="pass" id="password" placeholder="Votre mot de passe">
                <img src="img/eye.svg" alt="Show Password" class="toggle-password" id="togglePassword">
            </div>
            <?php

require('database.php');

// Vérification si la méthode de requête est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire (email et mot de passe)
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Vérification que l'email et le mot de passe ne sont pas vides
    if ($email != "" && $password != "") {

        // Préparer la requête pour éviter les injections SQL
        $stmt = $conn->prepare("SELECT id_users, pass FROM users WHERE email = ?");
        $stmt->bind_param("s", $email); // "s" signifie que nous passons une chaîne (string)
        $stmt->execute();
        $stmt->store_result(); // Stocke les résultats pour les vérifier

        // Vérifier si un utilisateur avec cet email existe
        if ($stmt->num_rows > 0) {
            // Lier les résultats à des variables
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();

            // Vérifier si le mot de passe fourni correspond au mot de passe haché dans la base de données
            if (password_verify($password, $hashed_password)) {
                // On récupère les infos de l'utulisateur et on les stocke pour les autres pages
                $GetInfoFromThisUser = $conn->prepare('SELECT id_users, username, email FROM users WHERE email = ?');
                $GetInfoFromThisUser->bind_param("s", $email); // Liaison de l'email comme paramètre
                $GetInfoFromThisUser->execute();
                $GetInfoFromThisUser->bind_result($id_users, $username, $email);

                 session_start();
                
                // Récupération des résultats
                if ($GetInfoFromThisUser->fetch()) {
                    $userInfo = [
                        'id_users' => $id_users,
                        'username' => $username,
                        'email' => $email,
                    ];
                    
                    // Stockage des informations dans la session
                    $_SESSION['id_users'] = $userInfo["id_users"];
                    $_SESSION['username'] = $userInfo["username"];
                    $_SESSION['email'] = $userInfo["email"];
                    $_SESSION['auth'] = TRUE;
                    
                    // Configuration de la durée de vie de la session
                    $sessionLifetime = 30 * 24 * 60 * 60; // 30 jours en secondes
                    session_set_cookie_params($sessionLifetime);
                    
                    // Régénération de l'ID de session pour des raisons de sécurité
                    session_regenerate_id(true);
                    
                    // Redirection vers la page principale (index.php)
                    header('Location: index.php');
                    exit();
                }

            } else {
                // Si le mot de passe est incorrect
                echo "<p>Email ou mot de passe incorrect.</p>";
            }
        } else {
            // Si aucun utilisateur n'est trouvé avec cet email
            echo "<p>Aucun utilisateur trouvé avec cet email.</p>";
        }

        // Fermer la requête préparée
        $stmt->close();
    } else {
        // Si l'email ou le mot de passe est vide
        echo "<p>L'email et le mot de passe sont requis.</p>";
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);

?>
            <a href="#" class="oublie">Mot de passe oublié ?</a>
            <input type="submit" value="Se connecter" id="connexion-btn">
        </form>
        <hr>
        <a href="inscription.php" class="inscription">Créer un compte</a>
    </div>
</body>
</html>

