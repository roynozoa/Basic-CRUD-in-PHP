<?php 

session_start();
if(!isset($_SESSION["login"])){

    header("Location: login.php");
    exit;
}

require 'functions.php';

if(isset($_POST["register"])){

    if(register($_POST) > 0){
        echo "
        <script>
            alert('Customer Added Succesfull!');
            
        </script>";
    } else {
        echo mysqli_error($databaseConnection);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    

<h1>Customer Registration Page</h1>

<a href="index.php">Back To Home</a>

<form action="" method="post">

    <ul>
        <label for="username" >Username: </label>
        
        <input type="text" name="username" id="username" required  >
        
    
        <label for="password">Password: </label>
        
        <input type="password" name="password" id="password" required>
        

        <label for="password2">Confirm Password: </label>
        
        <input type="password" name="password2" id="password2" required>
        

        <label for="customerName">Name: </label>
        
        <input type="text" name="customerName" id="customerName" required>
        

        <label for="email">Email Address: </label>
        
        <input type="text" name="email" id="email" required>
        

        <label for="address">Address: </label>
        
        <input type="text" name="address" id="address" required>
        

        <label for="phoneNumber">Phone Number: </label>
        
        <input type="text" name="phoneNumber" id="phoneNumber" required>
        

        <label for="image">Photo Profile: </label>
        
        <input type="file" name="image" id="image">
        <br><br>

        <button type="submit" name="register">Register</button>

    </ul>

</form>

</body>
</html>