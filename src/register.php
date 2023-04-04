<?php

require("../includes/bdd.php");
require("../includes/function.php");

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-confirm'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $password_confirm = htmlspecialchars($_POST['password-confirm']);

    if(usernameCheck($conn, $username) === 0){
        if($password === $password_confirm){
            $salt = bin2hex(random_bytes(16));
            $hash = password_hash($password . $salt, PASSWORD_ARGON2ID);

            $qry = "INSERT INTO users (username,password_hash,password_salt) values (?,?,?)";
            $stmt = mysqli_prepare($conn, $qry);
            if($stmt){
                mysqli_stmt_bind_param($stmt, 'sss', $username, $hash, $salt);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "Inscription validé";
                echo '<br><a href="login.php">Se connecter</a>';
                
            } else {
                die('MySQL Error: ' . mysqli_error($conn));
            }
        } else {
            echo "Les deux mots de passes doivent être identiques";
        }
    } else {
        echo "Ce nom d'utilisateur est déjà utilisé";
    }
}