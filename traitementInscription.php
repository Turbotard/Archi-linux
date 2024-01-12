<?php

$env = parse_ini_file('variables.env');

$servername = $env['servername'];
$username = $env['username'];
$password = $env['password'];

try {
    $bdd = new PDO("mysql:host=$servername;dbname=users", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connexion réussie";
} catch (PDOException $e) {
    echo "connexion échouée: " . $e->getMessage();
}

if (isset($_POST['ok'])) {
    echo "ok";
    $name = $_POST['name'];
    $password = $_POST['password'];

    $requete = $bdd->prepare("INSERT INTO user (name, password) VALUES (:name, :password)");
    echo "requete préparée";
    $requete->execute(array(
        "name" => $name,
        "password" => $password
    )
  );
  echo $name;
  echo $password;
    echo "inscription réussie";
}
?>
