<?php 

session_start();
if(!isset($_SESSION["login"])){

    header("Location: login.php");
    exit;
}


require 'functions.php';

//connect to database


if(isset($_POST["submit"])){
    
    if (addFood($_POST) > 0){
        echo "
        <script>
            alert('Food Added!');
            document.location.href = 'index.php';
        </script>";

    } else {
        echo "
        <script>
            alert('Failed to adding food!');
            document.location.href = 'index.php';
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food</title>
</head>
<body>
    <h1>Add Food</h1>
    <a href="index.php">Back To Home</a>

    <form action="" method="POST" enctype="multipart/form-data">
        <ul> 
            <label for="name" >Name: </label>
            <br>
            <input type="text" name="name" id="name" required>
            <br>
        
            <label for="category">Category: </label>
            <br>
            <input type="text" name="category" id="category" required>
            <br>
        
            <label for="price">Price: </label>
            <br>
            <input type="number" name="price" id="price" required>
            <br>
        
            <label for="seller">Seller Name: </label>
            <br>
            <input type="text" name="seller" id="seller" required>
            <br>
        
            <label for="image">Source Image: </label>
            <br>
            <input type="file" name="image" id="image" >
            <br><br>

            <button type="submit" name="submit">Add Food</button>
            <br>
        </ul>

    </form>

</body>
</html>

