<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>

    <?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: connexion.php");
        exit;
    }

    $env = parse_ini_file('variables.env');
    $servername = $env['servername'];
    $username = $env['username'];
    $password = $env['password'];

    try {
        $bdd = new PDO("mysql:host=$servername;dbname=users", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM user";
        $req = $bdd->query($sql);
        echo "<div class='list'><ul>";
        while ($rep = $req->fetch()) {
            echo "<li><div class='user'><h4>- " . $rep['name'] . "</h4><div><input type='button' class='btn' value='supprimer'></div></div></li>";
        }
        echo "</ul></div>";
    } catch (PDOException $e) {
        echo "Erreur de connexion: " . $e->getMessage();
    }
    ?>

    <div class="block-2">
        <div class="block-2-header">
            <h3>Liste des utilisateurs</h3>
        </div>
    </div>

</body>

</html>