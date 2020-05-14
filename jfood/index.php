<?php 

session_start();
if(!isset($_SESSION["login"])){

    header("Location: login.php");
    exit;
}

require 'functions.php';

$arrayFood = query("SELECT * FROM food ");


if(isset($_POST["search"])){


    $arrayFood = searchFood($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        .loader{
            width: 90px;
            position: absolute;
            top: 153px;
            z-index: -1;
            left: 290px;
            display: none;
        }

        /* @media print {
            .logout{
                display: none;
            }

            .register{
                display: none;
            }

            .addfood{
                display: none;
            }

            .searchbox{
                display: none;
            }
        } */
    </style>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<h1>List of Food</h1>

<a href="register.php" class="register">Register</a>
<br><br>

<a href="logout.php" class="logout">Log Out</a>
<br><br>

<a href="addfood.php" class="addfood">Add Food</a>
<br><br>



<form action="" method="POST">

    <input type="text" name="keyword" size="40" autofocus autocomplete="off" placeholder="Search Food" id="keyword" class="searchbox">

    <button type="submit" name="search" id="searchButton">Search</button>

    <img src="img/loading.gif" class="loader">

</form>

<br>

<div id="container">
<table border="5" style="width:100%">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Seller</th>
        <th>Action</th>
        <th>Image</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach($arrayFood as $displayFood) : ?>

    <tr>
        <td><?= $i ?></td>

        <td><?= $displayFood["name"] ?></td>

        <td><?= $displayFood["category"] ?></td>

        <td><?= $displayFood["price"] ?></td>

        <td><?= $displayFood["seller"] ?></td>

        <td>
            <a href="update.php?id=<?= $displayFood["id"]?>">Update</a> |
            <a href="delete.php?id=<?= $displayFood["id"]?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
        
        <td><img src="img/<?= $displayFood["image"]?>" width="150" ></td>
    </tr>

    <?php $i++; ?>
    <?php endforeach; ?>
</table>
</div>



</body>
</html>