<?php 
session_start();
require 'functions.php';
//cookie check
if(isset($_COOKIE['id']) && isset($_COOKIE["username"])){
    
    $id = $_COOKIE['id'];
    $userkey = $_COOKIE["username"];

    //Get username from id
    $checkUsername = mysqli_query($databaseConnection, "SELECT * FROM customer WHERE id = '$id'");
    $loginData = mysqli_fetch_assoc($checkUsername);

    if ($userkey === hash('sha256',$loginData['username'])){
        $_SESSION["login"] = true;

    }
}


if(isset($_SESSION["login"])){

    header("Location: index.php");
    exit;
}



if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];
    


    $checkUsername = mysqli_query($databaseConnection, "SELECT * FROM customer WHERE username = '$username'");

    //Check username
    if (mysqli_num_rows($checkUsername) === 1){
        
        //Check password
        $loginData = mysqli_fetch_assoc($checkUsername);
        if(password_verify($password, $loginData["password"])){
            //Set session
            $_SESSION["login"] = true;

            //Remember me check
            if(isset($_POST["remember"])){
                //create a cookie
                setcookie('id', $loginData['id'], time()+60);
                setcookie('username', hash('sha256',$loginData['username']), time()+60);
            }
            header("Location: index.php");
            exit;
        }
    }

    $loginError = true;

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* .enter {
            display: block;
        } */
    </style>
</head>
<body>
    <h1>Customer Login Page</h1>

    <?php if(isset($loginError)):?>
        <p style="color: red; font-style: italic;">Username/Password is incorrect!</p>
    <?php endif; ?>
    <form action="" method="post">

    <ul>
        <label for="username" style="display:block;">Username: </label>
        <input type="text" name="username" id="username" required  >
        
    
        <label for="password" style="display:block;">Password: </label>
        <input type="password" name="password" id="password" required>
        
        <br>
        <input type="checkbox" name="remember" id="remember" >
        <label for="remember" >Remember Me </label>
        <br><br>

        <button type="submit" name="login">Log in</button>
    </ul>

    </form>
</body>
</html>
