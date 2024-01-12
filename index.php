<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>
  <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="block-2">
        <div class="block-2-header">
            <h3>Liste des utilisateurs (0)</h3>
        </div>
        <div class="list">
            <ul>
                <li>
                    <div class="user">
                        <h4>- Samba</h4>
                        <div>
                            <input type="button" class="btn" value="supprimer">
                        </div>
                    </div>
                    <div class="user">
                        <h4>- Samba</h4>
                        <div>
                            <input type="button" class="btn" value="supprimer">
                        </div>
                    </div>
                </li>
            </ul>
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
$sql = "SELECT * FROM user";
$req = $bdd->query($sql);
while ($rep = $req->fetch()) {
echo $rep['name']."<br>";
echo "<input type='button'>";
}
?>
</body>


