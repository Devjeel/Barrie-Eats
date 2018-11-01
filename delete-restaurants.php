<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Restaurants</title>
</head>
<body>

<?php
// auth check
session_start();
if (empty($_SESSION['userId'])) {
    header('location:login.php');
    exit();
}

// Get select restaurants ID
$restaurantId =  $_GET['restaurantId'];

//Connect
$db = new PDO('mysql:host=localhost;dbname=barrieEats', 'root','jeelhp2015.');

//Set up and  execute SQL DELETE command
$sql = "DELETE FROM restaurants WHERE restaurantId = :restaurantId";
$cmd = $db->prepare($sql);
$cmd->bindParam(':restaurantId',$restaurantId, PDO::PARAM_INT);
$cmd->execute();

//Redirect to restaurants page
header('location: restaurants.php')
?>

</body>
</html>