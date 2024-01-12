<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue</title>
  <link rel="stylesheet" href="/style.css">
</head>
<body>

<div class="block-3">
        <h3>Gestionnaire de base de donnée</h3>
        <div class="block-3-inputs">
            <a href="connexion.php"><input type="button" class="btn" value="Connexion"></a>
            <a href="inscription.php"><input type="button" class="btn" value="Inscription"></a>
        </div>
    </div>


<?php

$env = parse_ini_file('variables.env');

$servername = $env['servername'];
$username = $env['username'];
$password = $env['password'];

try {
$bdd = new PDO("mysql:host=$servername;dbname=users", $username, $password);
$bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
echo "connexion échouée: " . $e->getMessage();
}

?>
</body>


