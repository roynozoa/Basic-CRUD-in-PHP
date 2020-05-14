<?php 

require '../functions.php';
usleep(200000);
$keyword = $_GET['s'];


$searchQuery = "SELECT * FROM food WHERE 
                name LIKE '%$keyword%' OR
                category LIKE '%$keyword%' OR
                seller LIKE '%$keyword%'";

$arrayFood = query($searchQuery);


?>

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