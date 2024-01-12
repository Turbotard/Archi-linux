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
