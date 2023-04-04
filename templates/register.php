<?php  if(isset($_SESSION)){ header("Location: home.php");} ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire d'inscription</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Inscription</h1>
        <form method="POST">
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" maxlength="30" required>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>

            <label for="password-confirm">Confirmer le mot de passe:</label>
            <input type="password" id="password-confirm" name="password-confirm" placeholder="Entrez à nouveau votre mot de passe" required>

            <input type="submit" value="S'inscrire">
        </form>
    </body>
</html>

<?php
require("../src/register.php");
?>
