<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Restaurants</title>
</head>
<body>

<?php
// auth check
session_start();
if (empty($_SESSION['userId'])) {
    header('location:login.php');
    exit();
}

// introduce variables and save values
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$restaurantType = $_POST['restaurantType'];
$restaurantId = $_POST['restaurantId'];

//Validate each input
$OK = true;

if(empty($name)) {
    echo "Name is Required. <br />";
    $OK = false;
}
if(empty($address)) {
    echo "Address is Required <br />";
    $OK = false;
}
if(empty($phone)) {
    echo "Phone is Required <br />";
    $OK = false;
}

// Select restaurant type validation
if($restaurantType == "-Select-"){
    echo"Restaurant type is not selected<br />";
    $OK = false;
}

if(OK == true){
    //connect to database with server, username,password, dbname
    $db = new PDO('mysql:host=localhost; dbname=barrieEats', 'root', 'jeelhp2015.');

    // setup and execute an INSERT or UPDATE command
    if(empty($restaurantId)) {
        $sql = "INSERT INTO restaurants (name, address, phone, restaurantType) VALUES(:name, :address, :phone, :restaurantType)";
    }
    else {
        $sql = "UPDATE restaurants SET name = :name, address = :address, phone = :phone, restaurantType = :restaurantType WHERE restaurantId = :restaurantId";
    }

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 60);
    $cmd->bindParam(':address', $address, PDO::PARAM_STR, 120);
    $cmd->bindParam(':phone',$phone, PDO::PARAM_STR, 15);
    $cmd->bindParam(':restaurantType',$restaurantType, PDO::PARAM_STR,60);

    if(!empty($restaurantId)){
        $cmd->bindParam('restaurantId', $restaurantId,PDO::PARAM_INT);
    }
    $cmd->execute();

    //disconnect
    $db = null;

    header('location:restaurants.php');
}
?>

</body>
</html>