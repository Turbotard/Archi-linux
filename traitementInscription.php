<?php
$servername= "10.57.33.246";
$username= "samba";
$password = "samba";

try {
$bdd = new PDO("mysql:host=$servername;dbname=users", $username, $password);
$bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "connexion réussie";
}
catch (PDOException $e) {
echo "connexion échouée: " . $e->getMessage();
}

if (isset($_POST['ok'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $requete = $bdd->prepare("INSERT INTO users VALUES (0, :name, :password)");
    $requete->execute(array(
        "name" => $name,
        "password" => $password
    ));
    echo "inscription réussie";
  }
?>