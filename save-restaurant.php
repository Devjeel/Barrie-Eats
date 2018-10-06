<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Restaurants</title>
</head>
<body>

<?php
// introduce variables and save values
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$restaurantType = $_POST['restaurantType'];

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

    // setup and execute an INSERT command
    $sql = "INSERT INTO restaurants (name, address, phone, restaurantType) VALUES(:name, :address, :phone, :restaurantType)";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 60);
    $cmd->bindParam(':address', $address, PDO::PARAM_STR, 120);
    $cmd->bindParam(':phone',$phone, PDO::PARAM_STR, 15);
    $cmd->bindParam(':restaurantType',$restaurantType, PDO::PARAM_STR,60);
    $cmd->execute();

    //disconnect
    $db = null;

    echo "restaurant saved!!";
}
?>

</body>
</html>