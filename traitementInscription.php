<?php
session_start();

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
    $name = $_POST['name'];
    $password = $_POST['password'];

    try {
        $requete = $bdd->prepare("INSERT INTO user (name, password) VALUES (:name, :password)");
        $requete->execute(array("name" => $name, "password" => $password));

        $last_id = $bdd->lastInsertId();

        $_SESSION['user_id'] = $last_id;
        $_SESSION['user_name'] = $name;

        header("Location: home.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de l'inscription: " . $e->getMessage();
    }
}
?>
