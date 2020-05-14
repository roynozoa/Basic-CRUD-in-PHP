<?php 


session_start();
if(!isset($_SESSION["login"])){

    header("Location: login.php");
    exit;
}


//connect to database
require 'functions.php';

$getId = $_GET["id"];

$foodPtr = query("SELECT * FROM food WHERE id = $getId")[0];



if(isset($_POST["submit"])){

    if (updateFood($_POST) > 0){
        echo "
        <script>
            alert('Food Changed!');
            document.location.href = 'index.php';
        </script>";

    } else {
        echo "
        <script>
            alert('Failed to changing food!');
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

    <title>Update Food</title>
</head>
<body>
    <h1>Update Food</h1>
    <a href="index.php">Back To Home</a>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $foodPtr["id"]; ?>">
        <input type="hidden" name="originalImage" value="<?= $foodPtr["image"]; ?>">
        <ul>
            <label for="name" >Name: </label>
            <br>
            <input type="text" name="name" id="name" required value="<?= $foodPtr["name"]; ?>">
            <br>
        
            <label for="category">Category: </label>
            <br>
            <input type="text" name="category" id="category" required value="<?= $foodPtr["category"]; ?>">
            <br>
        
            <label for="price">Price: </label>
            <br>
            <input type="number" name="price" id="price" required value="<?= $foodPtr["price"]; ?>">
            <br>
        
            <label for="seller">Seller Name: </label>
            <br>
            <input type="text" name="seller" id="seller" required value="<?= $foodPtr["seller"]; ?>">
            <br>
        
            <label for="image">Source Image: </label>
            <br>
            <img src="img/<?=$foodPtr["image"]?>" width="60"><br>
            <input type="file" name="image" id="image" >
            <br><br>

            <button type="submit" name="submit">Update Food</button>
            <br>
        </ul>

    </form>

</body>
</html>

