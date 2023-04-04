<?php

require("../includes/bdd.php");
require("../includes/function.php");

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if(usernameCheck($conn, $username) === 1){
        if(hashCheck($conn, $username, $password) === true){
            $_SESSION['username'] = $username;
            header("Location: ../templates/home.php");
        } else {
            echo "Mauvais mot de passe";
        }
    } else {
        echo "Ce nom d'utilisateur n'existe pas ici.";
    }
}