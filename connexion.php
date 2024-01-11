<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>connexion</title>
</head>
<body>
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $password = $_POST['password'];

  if (!empty($name) && !empty($password)) {
    $req =$bdd->query("SELECT * FROM user WHERE name = '$name' AND password = '$password'");
    $rep = $req->fetch();
    if ($rep['id'] != false) {
      echo "connexion réussie";
    } else {
     $error_message = "identifiants incorrects";
    }
  }
}
?>

<form method="POST" action="">
  
<label for="name">name</label>
<input type="name" id="name" name="name" placeholder="entrez votre nom" required>
<br />

<label for="password">mot de passe</label>
<input type="password" id="password" name="password" placeholder="entrez votre mot de passe" required>
<br />
  <input type="submit" value="se connecter" name="ok">
</form>
</body>
</html>
