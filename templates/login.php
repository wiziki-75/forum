<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de connexion</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>Connexion</h1>
	<form method="POST">
		<label for="username">Nom d'utilisateur:</label>
		<input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" maxlength="30" required>

		<label for="password">Mot de passe:</label>
		<input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>

		<input type="submit" value="Se connecter">
	</form>
</body>
</html>


<?php
require("../src/login.php");
?>