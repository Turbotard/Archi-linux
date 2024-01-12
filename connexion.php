<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>connexion</title>
  <link rel="stylesheet" href="/style.css">
</head>

<body>
  <?php
  session_start(); // Démarrage de la session

  $env = parse_ini_file('variables.env');

  $servername = $env['servername'];
  $username = $env['username'];
  $password = $env['password'];

  try {
    $bdd = new PDO("mysql:host=$servername;dbname=users", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "connexion échouée: " . $e->getMessage();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($password)) {
      $req = $bdd->prepare("SELECT * FROM user WHERE name = ? AND password = ?");
      $req->execute([$name, $password]);
      $rep = $req->fetch();

      if ($rep) {
        $_SESSION['user_id'] = $rep['id'];
        $_SESSION['user_name'] = $name; 
        echo "connexion réussie";
      } else {
        $error_message = "identifiants incorrects";
        echo $error_message;
      }
    }
  }
  ?>

  <div class="block">
    <h2>Se connecter</h2>
    <form method="POST" action="">
      <div class="inputs">
        <input type="name" id="name" name="name" class="input" placeholder="entrez votre nom" required>
        <input type="password" id="password" name="password" class="input" placeholder="entrez votre mot de passe" required>
        <p>Vous n'avez pas encore de compte ? <a href="inscription.php" style="text-decoration: none; color: blue;">inscrivez-vous !</a></p>
      </div>
      <input type="submit" value="Connexion" name="ok" class="btn">
    </form>
  </div>
</body>

</html>
