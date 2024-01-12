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

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
            $delete_id = $_POST['delete_id'];
            $delete_stmt = $bdd->prepare("DELETE FROM user WHERE id = ?");
            $delete_stmt->execute([$delete_id]);
        }
    ?>
    
    <div class='block-2'>
        <div class='block-2-header'>
            <h3>Liste des utilisateurs</h3>
        </div>
        <div class='list'>
            <ul>
                <?php
                $sql = "SELECT * FROM user";
                $req = $bdd->query($sql);

                while ($rep = $req->fetch()) {
                    echo "<li>
                            <div class='user'>
                                <h4>- " . htmlspecialchars($rep['name']) . "</h4>
                                <form method='post' action=''>
                                    <input type='hidden' name='delete_id' value='" . $rep['id'] . "'>
                                    <input type='submit' class='btn' value='supprimer'>
                                </form>
                            </div>
                          </li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <?php
    } catch (PDOException $e) {
        echo "Erreur de connexion: " . $e->getMessage();
    }
    ?>

</body>

</html>
