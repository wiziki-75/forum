<?php
require("../includes/bdd.php");
require("../includes/function.php");

if(isset($_POST['post_id'])){
    likePost($conn, $_SESSION['username'], $_POST['post_id']);
    updatePostLike($conn, $_POST['post_id']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php if(!isset($_SESSION['username'])){ ?>
        <a href="register.php" class="btn">Inscription</a>
        <a href="login.php" class="btn">Se connecter</a>

        <?php } else { ?>

        <h1><?= $_SESSION['username'] ?></h1>
        <a href="post.php">Créer un poste</a>
        <a href="../src/logoff.php">Se déconnecter</a>

        <?php } ?>
        
        <div style="display: flex;">
            <ul style="flex: 1;">
                <h1>Les derniers postes</h1>
                <?php 
                    $posts = posts($conn, "date");
                    while ($row = mysqli_fetch_assoc($posts)) {
                        echo '<form method="POST"><li>';
                        echo '<h2>' . $row['title'] . '</h2>';
                        echo '<small>Publié par ' . $row['username'] . ' le ' . $row['date'] . '</small>';
                        echo '<p>' . $row['content'] . '</p>';
                        if(isset($_SESSION['username'])){
                            if(userLiked($conn, $_SESSION['username'], $row['id']) === 0){
                                echo '<input type="hidden" name="post_id" value="' . $row['id'] . '">';
                                echo '<button class="like-button" name="like">💚</button>';
                                echo '<span class="like-count">' . $row['int_like'] . '</span>';
                            } else {
                                echo '<span class="like-count">' . $row['int_like'] . '💚</span>';
                            }
                        } else {
                            echo '<span class="like-count">' . $row['int_like'] . '💚</span>';
                        }
                        echo '</li></form>';
                    }
                ?>
            </ul>

            <ul style="flex: 1;">
                <h1>Les plus aimés</h1>
                <?php 
                    $posts = posts($conn, "like");
                    while ($row = mysqli_fetch_assoc($posts)) {
                        echo '<form method="POST"><li>';
                        echo '<h2>' . $row['title'] . '</h2>';
                        echo '<small>Publié par ' . $row['username'] . ' le ' . $row['date'] . '</small>';
                        echo '<p>' . $row['content'] . '</p>';
                        if(isset($_SESSION['username'])){
                            if(userLiked($conn, $_SESSION['username'], $row['id']) === 0){
                                echo '<input type="hidden" name="post_id" value="' . $row['id'] . '">';
                                echo '<button class="like-button" name="like">💚</button>';
                                echo '<span class="like-count">' . $row['int_like'] . '</span>';
                            } else {
                                echo '<span class="like-count">' . $row['int_like'] . '💚</span>';
                            }
                        } else {
                            echo '<span class="like-count">' . $row['int_like'] . '💚</span>';
                        }
                        echo '</li></form>';
                    }
                ?>
            </ul>
        </div>
    </body>
</html>
