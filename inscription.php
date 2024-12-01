<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Around | Inscription</title>
    <link rel="stylesheet" href="amisStyle.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="inscription.css">
    <script src="navbar.js" defer></script>
    <script src="inscription.js" defer></script>
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
            <img src="MenuCode/img/search.svg" alt="Rechercher">
        </button>
    </div>


    <div class="inscription">
        <h1>Inscription</h1>
        <form action="" method="post">
            <div class="mail-container">
                <img src="img/mail.svg" alt="user" class="user">
                <label for="email">Adresse mail</label>
            </div>
            <input type="email" name="email" id="email" placeholder="Votre adresse mail" required>
            <div class="pseudo-container">
                <img src="img/user.svg" alt="pseudo" class="psd">
                <label for="email">Pseudo</label>
            </div>
            <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" required>
            <div class="pass-container">
                <img src="img/lock.svg" alt="lock" class="lock">
                <label for="password">Mot de passe</label>
            </div>
            <div class="password-container">
                <input type="password" name="pass" id="password" placeholder="Votre mot de passe">
                <img src="img/eye.svg" alt="Show Password" class="toggle-password" id="togglePassword">
            </div>
            <div class="pass2-container">
                <img src="img/lock.svg" alt="lock" class="lock2">
                <label for="password">Confirmer le mot de passe</label>
            </div>
            <div class="password2-container">
                <input type="password" name="pass2" id="password2" placeholder="Confirmez votre mot de passe">
                <img src="img/eye.svg" alt="Show Password" class="toggle-password2" id="togglePassword2">
            </div>
            <?php

require('database.php');

// Traitement de l'inscription si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si 'ok' est présent dans POST, ce qui signifie que le formulaire a été soumis
    if (isset($_POST['ok'])) {
        // Récupérer les données envoyées par POST
        $email = trim($_POST['email']);
        $pseudo = trim($_POST['pseudo']);
        $password = $_POST['pass'];
        $password2 = $_POST['pass2'];

        // Vérifier si les mots de passe correspondent
        if ($password === $password2) {
            // Hacher le mot de passe avant de le stocker
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Vérifier si l'e-mail existe déjà
            $reqEmail = $conn->prepare("SELECT email FROM users WHERE email = ?");
            $reqEmail->bind_param("s", $email);
            $reqEmail->execute();
            $reqEmail->store_result();

            if ($reqEmail->num_rows > 0) {
                echo "<p>L'adresse e-mail est déjà utilisée. Veuillez en essayer une autre.</p>";
            } else {
                // Requête préparée pour insérer un nouvel utilisateur
                $signupDate = date("Y-m-d H:i:s");
                $req = $conn->prepare("INSERT INTO users (username, email, pass, date_inscription) VALUES (?, ?, ?, ?)");
                $req->bind_param("ssss", $pseudo, $email, $hashedPassword, $signupDate);

                // Exécuter la requête et vérifier si l'insertion a réussi
                if ($req->execute()) {
                    // Inscription réussie, redirection vers la page de connexion
                    header('Location: connexion.php');
                    exit();
                } else {
                    // Afficher l'erreur s'il y a un problème
                    echo "<p>Erreur lors de l'inscription. Essayez à nouveau plus tard.</p>";
                }

                // Fermer la requête
                $req->close();
            }

            // Fermer la requête et la connexion
            $reqEmail->close();
            mysqli_close($conn);
        } else {
            // Si les mots de passe ne correspondent pas
            echo "<p>Les mots de passe ne correspondent pas. Veuillez réessayer.</p>";
        }
    }
}
?>
            <input type="submit" value="S'inscrire" id="connexion-btn" name="ok">
        </form>
        <hr>
        <a href="connexion.php" class="connexion">Se connecter</a>
    </div>
</body>
</html>

