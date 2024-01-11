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
$sql = "SELECT * FROM user";
$req = $bdd->query($sql);
while ($rep = $req->fetch()) {
echo $rep['id']."<br>";
}