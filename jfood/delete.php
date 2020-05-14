<?php 

session_start();
if(!isset($_SESSION["login"])){

    header("Location: login.php");
    exit;
}


require 'functions.php';


$id = $_GET["id"];


if (deleteFood($id) > 0){
    echo "
        <script>
            alert('Food Deleted!!');
            document.location.href = 'index.php';
        </script>";

    } else {
        echo "
        <script>
            alert('Failed to deleting food!');
            document.location.href = 'index.php';
        </script>";
}


?>