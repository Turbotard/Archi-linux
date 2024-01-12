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
            <label for="name">Votre nom :</label>
            <input type="text" id="name" name="name" class="input" placeholder="Entrez votre nom" required>

            <label for="password">Votre mot de passe :</label>
            <input type="password" id="password" name="password" class="input" placeholder="Entrez votre mot de passe" required>
        </div>
        <input type="submit" value="M'inscrire" class="btn" name="ok">
    </form>
</div>

</body>
</html>
