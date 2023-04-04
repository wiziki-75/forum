<?php

function usernameCheck($conn, $username){
    $qry = "SELECT username FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $qry);
    if($stmt){
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $num_rows = mysqli_num_rows($result);
        mysqli_stmt_close($stmt);
        return $num_rows;
    } else {
        die('MySQL Error: ' . mysqli_error($conn));
    }
}

function hashCheck($conn, $username, $password){
    $qry = "SELECT password_hash,password_salt FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $qry);
    if($stmt){
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        $rows = mysqli_fetch_assoc($result); 
        if(password_verify($password . $rows['password_salt'], $rows['password_hash'])){
            return true;
        } else {
            return false;
        }
    } else {
        die('MySQL Error: ' . mysqli_error($conn));
    }
}

function posts($conn, $option){
    if($option == "date"){
        $qry = "SELECT * FROM posts ORDER BY date DESC";
    } else if($option == "like"){
        $qry = "SELECT * FROM posts ORDER BY int_like DESC";
    } else {
        die("Mauvaise option (arg 2)");
    }
    $stmt = mysqli_prepare($conn, $qry);
    if($stmt){
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    } else {
        die('MySQL Error: ' . mysqli_error($conn));
    }
}

function userLiked($conn, $username, $post_id){
    $qry = "SELECT * FROM user_liked WHERE username = ? AND post_id = ?";
    $stmt = mysqli_prepare($conn, $qry);
    if($stmt){
        mysqli_stmt_bind_param($stmt, 'si', $username, $post_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $num_rows = mysqli_num_rows($result);
        mysqli_stmt_close($stmt);
        return $num_rows;
    } else {
        die('MySQL Error: ' . mysqli_error($conn));
    }
}


function likePost($conn, $username, $post_id){
    $qry = "INSERT INTO user_liked (username,post_id) values (?,?)";
    $stmt = mysqli_prepare($conn, $qry);
    if($stmt){
        mysqli_stmt_bind_param($stmt, 'si', $username, $post_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die('MySQL Error: ' . mysqli_error($conn));
    }
}

function updatePostLike($conn, $post_id){
    $qry = "UPDATE posts SET int_like = int_like + 1 WHERE id = ?";
    $stmt = mysqli_prepare($conn, $qry);
    if($stmt){
        mysqli_stmt_bind_param($stmt, 'i', $post_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die('MySQL Error: ' . mysqli_error($conn));
    }
}

?>