<?php
require("../src/post.php");
echo $_SESSION['username'];
if(!isset($_SESSION['username'])){ header("Location: home.php");}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Créer un poste</title>
    <link rel="stylesheet" type="text/css" href="css/post.css">
  </head>
  <body>
    <h1>Créer un poste</h1>
    <form method="post">
      <label for="titre">Titre :</label>
      <input type="text" id="titre" name="titre" placeholder="Entrez le titre de votre poste" maxlength="50" required>

      <label for="contenu">Contenu :</label>
      <textarea id="contenu" name="contenu" placeholder="Entrez le contenu de votre poste" maxlength="255" required></textarea>
    
      <input type="submit" value="Publier">
    </form>

    <div id="message"></div>

    <script>
      const champ = document.getElementById("contenu");
      const message = document.getElementById("message");
      const maxLength = parseInt(champ.getAttribute("maxlength"));

      champ.addEventListener("input", function() {
        const length = champ.value.length;
        if (length == maxLength) {
          champ.value = champ.value.substring(0, maxLength);
          message.textContent = "Vous avez atteint la limite de caractères autorisée.";
        } else {
          message.textContent = "";
        }
      });
    </script>

  </body>
</html>
