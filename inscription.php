<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>

<div class="block">
        <h2>S'enregistrer</h2>
        <form method="POST" action="traitementInscription.php">
            <div class="inputs">
                <input type="text" id="name" name="name" class="input" placeholder="entrez votre nom" required>
                <input type="password" id="password" name="password"  class="input" placeholder="entrez votre mot de passe" required>
                <p>Vous avez déjà un compte ? <a href="connexion.php" style="text-decoration: none; color: blue;">connectez-vous !</a></p>
            </div>
            <input type="submit" value="m'inscrire" class="btn" name="ok">
        </form>
    </div>

</body>
</html>
