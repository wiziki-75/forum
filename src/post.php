<?php
require("../includes/bdd.php");
require("../includes/function.php");

if(isset($_POST['titre']) && isset($_POST['contenu'])){
    $title = htmlspecialchars($_POST['titre']);
    $content = htmlspecialchars($_POST['contenu']);

    $qry = "INSERT INTO posts (title,content,username) values (?,?,?)";
    $stmt = mysqli_prepare($conn, $qry);
    if($stmt){
        mysqli_stmt_bind_param($stmt, 'sss', $title, $content, $_SESSION['username']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: home.php");
    } else {
        die('MySQL Error: ' . mysqli_error($conn));
    }
}

?>