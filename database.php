<?php

$servername = "localhost";
$database = "u934801206_main";
$username = "u934801206_t_matisse";
$dbpassword = "=7yLxotd>&Hv";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $dbpassword, $database);

// Vérification de la connexion à la base de données
if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}



?>