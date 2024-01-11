<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
</head>
<body>

<form method="POST" action="traitement.php">

<label for="name">votre nom</label>
<input type="text" id="name" name="name" placeholder="entrez votre nom" required>
<br />

<label for="password">votre mot de passe</label>
<input type="password" id="password" name="password" placeholder="entrez votre mot de passe" required>
<br />

<input type="submit" value="m'inscrire" name="ok">
</form>
  
</body>
</html>