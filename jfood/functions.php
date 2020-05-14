<?php
//connect to a database
$databaseConnection = mysqli_connect("localhost", "root", "", "jfood");


//fetching
// while ($arrayFood = mysqli_fetch_assoc($result)){
//     var_dump($arrayFood);

// }

function query($query){
    global $databaseConnection;
    $result = mysqli_query($databaseConnection, $query);
    $tempRow = [];
    while($row = mysqli_fetch_assoc($result)){
        $tempRow[] = $row;
    }
    return $tempRow;
}


function addFood($foodPost){
    global $databaseConnection;

    $name = htmlspecialchars($foodPost["name"]);
    $category = htmlspecialchars($foodPost["category"]);
    $price = htmlspecialchars($foodPost["price"]);
    $seller = htmlspecialchars($foodPost["seller"]);
    
    $image = upload();

    if(!$image){
        return false;
    } 
    //$image = htmlspecialchars($foodPost["image"]);

    $query = "INSERT INTO food VALUES 
        ('', '$name', '$category', '$price', '$seller', '$image')";

    mysqli_query($databaseConnection, $query);

    return mysqli_affected_rows($databaseConnection);

}


function upload(){
    
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $errorMessage = $_FILES['image']['error'];
    $tempName = $_FILES['image']['tmp_name'];

    if($errorMessage === 4){
        echo "<script>
                alert('Please add image!');
            </script>";
        return false;
    }

    $fileExtensionArray = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $fileName);
    $thisFileExtension =strtolower(end($fileExtension));

    if(!in_array($thisFileExtension, $fileExtensionArray)){
        echo "<script>
                alert('Please add a proper image file!');
            </script>";
        return false;
    }

    if($fileSize > 2000000){
        echo "<script>
                alert('File size to large');
            </script>";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $thisFileExtension;
    move_uploaded_file($tempName, 'img/'.$newFileName);

    return $newFileName;

}

function deleteFood($getId){
    global $databaseConnection;
    mysqli_query($databaseConnection, "DELETE FROM food WHERE id = $getId ");

    return mysqli_affected_rows($databaseConnection);

}

function updateFood($foodUpdate){
    global $databaseConnection;

    $id = $foodUpdate["id"];
    $name = htmlspecialchars($foodUpdate["name"]);
    $category = htmlspecialchars($foodUpdate["category"]);
    $price = htmlspecialchars($foodUpdate["price"]);
    $seller = htmlspecialchars($foodUpdate["seller"]);
    $originalImage = htmlspecialchars($foodUpdate["originalImage"]);


    if($_FILES['image']['error'] === 4){
        $image = $originalImage;
    } else {
        $image = upload();
    }


    $query = "UPDATE food SET 
            name = '$name',
            category = '$category',
            price = '$price',
            seller = '$seller',
            image = '$image'
            WHERE id = $id;
            ";

    mysqli_query($databaseConnection, $query);

    return mysqli_affected_rows($databaseConnection);

}

function searchFood($keyword){
    $searchQuery = "SELECT * FROM food WHERE 
                    name LIKE '%$keyword%' OR
                    category LIKE '%$keyword%' OR
                    seller LIKE '%$keyword%'";

    return query($searchQuery);
}

function register($registerData){
    global $databaseConnection;


    $username = strtolower(stripslashes($registerData["username"]));
    $password = mysqli_real_escape_string($databaseConnection, $registerData["password"]);
    $password2 = mysqli_real_escape_string($databaseConnection, $registerData["password2"]);
    $customerName = htmlspecialchars($registerData["customerName"]);
    $email = htmlspecialchars($registerData["email"]);
    $address = htmlspecialchars($registerData["address"]);
    $phoneNumber = htmlspecialchars($registerData["phoneNumber"]);
    // $image = upload();

    // if(!$image){
    //     return null;
    // } 

    $checkUsername = mysqli_query($databaseConnection, "SELECT username FROM customer
                    WHERE username = '$username'");
    
    if (mysqli_fetch_assoc($checkUsername)){
        echo "<script>
                alert('Username already existed');
            </script>";
        return false;
    }

    if($password !== $password2){
        echo "<script>
                alert('Please enter same password');
            </script>";
        return false;
    }

    //encrypted password
    $passwordEncrypted = password_hash($password, PASSWORD_DEFAULT);
    
    mysqli_query($databaseConnection, "INSERT INTO customer VALUES 
                ('', '$username', '$passwordEncrypted','$customerName',
                '$email', '$address', '$phoneNumber', '')");

    return mysqli_affected_rows($databaseConnection);
}


?>


