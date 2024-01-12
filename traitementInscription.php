<?php

$env = parse_ini_file('variables.env');

$servername = $env['servername'];
$username = $env['username'];
$password = $env['password'];

try {
  $bdd = new PDO("mysql:host=$servername;dbname=users", $username, $password);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "connexion réussie";
  header('Location: home.php');
} catch (PDOException $e) {
  echo "connexion échouée: " . $e->getMessage();
}

if (isset($_POST['ok'])) {
  echo "ok";
  $name = $_POST['name'];
  $password = $_POST['password'];
  echo $name;
  echo $password;
  try {
    $requete = $bdd->prepare("INSERT INTO user (name, password) VALUES (:name, :password)");
    $requete->execute(
      array(
        "name" => $name,
        "password" => $password
      )
    );
    echo "inscription réussie";
  } catch (PDOException $e) {
    echo "Erreur lors de l'inscription: " . $e->getMessage();
  }


  echo "inscription réussie";
}
?>