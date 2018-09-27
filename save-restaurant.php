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


//connect to database with server, username,password, dbname
$db = new PDO('mysql:host=localhost; dbname=barrieEats', 'root', 'jeelhp2015.');

// setup and execute an INSERT command
$sql = "INSERT INTO restaurants (name, address, phone) VALUES(:name, :address, :phone)";
$cmd = $db->prepare($sql);
$cmd->bindParam(':name', $name, PDO::PARAM_STR, 60);
$cmd->bindParam(':address', $address, PDO::PARAM_STR, 120);
$cmd->bindParam(':phone',$phone, PDO::PARAM_STR, 15);
$cmd->execute();

//disconnect
$db = null;

echo "restaurant saved!!"
?>

</body>
</html>